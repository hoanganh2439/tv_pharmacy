<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\payments; 
use DB;  
class PaymentController extends Controller
{
    public function getAdd()
    {
    	return view('admin.payment.addpayment');
    }
    public function postAdd(Request $request)
    {
    	$payment = new payments;
    	$payment->code_pay = $request->codepay;
    	$payment->fullname = $request->fullname;
    	$payment->limitdate = $request->limitdate;
    	$payment->CVC = $request->cvc;
    	$payment->totalmoney = $request->total;
    	$payment->save();
    	return redirect('admin/payment/addpayment')->with('messages','success');
    }
}
