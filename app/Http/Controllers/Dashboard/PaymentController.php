<?php

namespace App\Http\Controllers\Dashboard;

use App\User;
use App\Order;
use App\Payment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use DB;
class PaymentController extends Controller
{

    public function create($affiliate,$order)
    {
        $affiliate = User::FindOrFail($affiliate);
        $order = Order::FindOrFail($order);
        return view('dashboard.payments.create',compact('affiliate','order'));
    }//end of create

    public function store(Request $request)
    {
       $data = $request->all();
      //return $data;
       $request->validate([
            'transfer_method' => 'required',
            'transfer_date' => 'required',
            'transfer_amount' => 'required',
        ]);

        $payment = Payment::create($data);
        session()->flash('success', __('site.added_successfully'));
        return redirect('dashboard/orders');
    }//end of store

}//end of controller
