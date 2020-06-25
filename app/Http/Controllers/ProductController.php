<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App\User;
use Auth;
class ProductController extends Controller
{
    public function products(Request $request)
    {
      if (Auth::check() && auth()->user()->active == 1) {
        $categories = Category::all();
        $vendors = User::whereRoleIs('admin')->get();
        $commissions = Product::select('commission')->groupBy('commission')->get();
        $products = Product::when($request->search, function ($q) use ($request) {

            return $q->where('name', '%' . $request->search . '%');

        })->when($request->category_id, function ($q) use ($request) {

            return $q->where('category_id', $request->category_id);

        })->when($request->commission, function ($q) use ($request) {

            return $q->where('commission', $request->commission);

        })->latest()->paginate(20);
        
        return view('products',compact('categories','products','commissions','vendors'));
      }else{
        return redirect('/active/account')->with('flash_message_error','Your account is not activated! Please confirm your Phone to activate.'); 
      }
    }// end of index

}//end of controller
