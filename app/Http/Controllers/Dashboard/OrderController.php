<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Order;
class OrderController extends Controller
{

    public function index(Request $request)
    {
        if(request()->ajax())
        {
            return datatables()->of(Order::latest()->get())
                ->addColumn('action', function($data){
                    $button = '<a href="affiliates/'.$data->affiliate_id.'/orders/'.$data->id.'/payments/create" id="'.$data->id.'" class="testt btn btn-info">تحويل العمولة</a>';
                    $button .= '&nbsp;&nbsp;';
                    $button .= '<button type="button" name="delete" num="'.$data->name.'" id="'.$data->id.'" class="delete btn btn-danger btn-sm"><i class="fa fa-trash"></i> حذف</button>';
                    $button .= '<button type="button" class="btn btn-primary btn-sm order-products" data-url="dashboard/orders/'.$data->id.'/products" data-method="get"><i class="fa fa-calendar-minus-o"></i> الفاتورة</button>';
                    $button .= '<button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-primary btn-sm"><i class="fa fa-eye"></i> تفاصيل</button>';
                    return $button;
                })
                ->addColumn('affiliate', '<td>{{vendor_name($affiliate_id)}}</td>')
                ->addColumn('order_date', function($data){
                    return date('d-m-Y', strtotime($data->created_at));
                })
                ->rawColumns(['action','order_date','affiliate'])
                ->make(true);
        }
        return view('dashboard.orders.view_order');
    }

     public function show($id)
    {  
        if(request()->ajax())
        {
            $data = Order::findOrFail($id);
            return response()->json(['data' => $data]);
        }
    }//end of edit

    public function products(Order $order){
        $products = $order->products;
        return view('dashboard.orders._products', compact('order', 'products'));
    }//end of products
    


    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        foreach ($order->products as $product) {

            $product->update([
                'stock' => $product->stock + $product->pivot->quantity
            ]);
        }//end of for each

        $order->delete();
        return response()->json(['success' => 'تم حذف البيانات بنجاح']);
    }//end of destroy

    

    

}//end of controller
