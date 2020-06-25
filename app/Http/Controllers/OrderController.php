<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use App\User;
use App\Product;
use App\Category;
use App\Order;
use Auth;
use Illuminate\Http\Request;


class OrderController extends Controller
{
    public function create($id)
    {
        $products = Product::all();
        //$categories = Category::with('products')->get();
        //return $categories;
        $user = User::FindOrFail($id);
        //$orders = $user->orders()->with('products')->paginate(5);
        return view('affiliates.orders.create',compact('products','user'));

    }//end of create

    public function store(Request $request, $id)
    {
        $data = $request->all();
        //return $request->products;
        //return $data;
        $affiliate_id = Auth::user()->id;
        $order = new Order;
        $order->affiliate_id = $affiliate_id;
        $order->phone = $data['phone'];
        $order->full_name = $data['full_name'];
        $order->governrate = $data['governrate'];
        $order->city = $data['city'];
        $order->address = $data['address'];
        $order->total_price = $data['grand_total'];
        $order->commission = '30';
        $order->status = '1';
        $order->save();
        $order->products()->attach($request->products);
        $total_price = 0;
        $commission = 0;
        foreach ($request->products as $id => $quantity) {

            $product = Product::FindOrFail($id);
            $total_price += $product->price * $quantity['quantity'];
            $commission += $product->commission;

            $product->update([
                'stock' => $product->stock - $quantity['quantity']
            ]);

        }//end of foreach

        $order->update([
            'total_price' => $total_price,
            'commission' => $commission
        ]);

        
    }//end of store

    public function thanksPaypal(){
       // $lastInsertOrder = Order::
        return view('dashboard.orders.thanks_paypal');
    }

    public function paypal()
    {
         return view('dashboard.orders.paypal');
    }

    public function cancelPaypal(){
        return view('dashboard.orders.cancel_paypal');
    }

    public function edit(Client $client, Order $order)
    {
        $categories = Category::with('products')->get();
        $orders = $client->orders()->with('products')->paginate(5);
        return view('dashboard.clients.orders.edit', compact('client', 'order', 'categories', 'orders'));

    }//end of edit

    public function update(Request $request, Client $client, Order $order)
    {
        $request->validate([
            'products' => 'required|array',
        ]);

        $this->detach_order($order);

        $this->attach_order($request, $client);

        session()->flash('success', __('site.updated_successfully'));
        return redirect()->route('dashboard.orders.index');

    }//end of update

    private function attach_order($request, $client)
    {
        $order = $client->orders()->create([]);
        
        $order->products()->attach($request->products);

        $total_price = 0;

        foreach ($request->products as $id => $quantity) {

            $product = Product::FindOrFail($id);
            if (!empty($request->dicount)) {
                $total_price += ($product->sale_price * $quantity['quantity']) - $request->dicount;
            }else{
                $total_price += $product->sale_price * $quantity['quantity'];
            }
            
            $product->update([
                'stock' => $product->stock - $quantity['quantity']
            ]);

        }//end of foreach

        $order->update([
            'total_price' => $total_price,
            'discount' => $request->dicount
        ]);

        Session::put('order_id',$order->id);
        Session::put('grand_total',$total_price);

    }//end of attach order

    private function detach_order($order)
    {
        foreach ($order->products as $product) {

            $product->update([
                'stock' => $product->stock + $product->pivot->quantity
            ]);

        }//end of for each

        $order->delete();

    }//end of detach order

    public function products(Order $order)
  {
    //return $order;
    $products = $order->products;
    //return $products;
    return view('dashboard.orders._products', compact('order', 'products'));
  }//end of products
}//end of controller
