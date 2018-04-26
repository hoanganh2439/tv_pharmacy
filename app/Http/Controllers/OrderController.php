<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\orders;
use App\products;
use App\Category;
use App\mades;
use App\Customers;
use App\images;
use App\orderdetail;
use DB,Carbon,PDF;
class OrderController extends Controller
{
	public function getlistOrder(){
	    $listOrder = orders::paginate(8);
	    $cate = Category::all();
	    $made = mades::all();
	    return view('admin.order.listorder',['listOrder'=>$listOrder,'cate'=>$cate,'made'=>$made]);
	}
	public function getConsider(Request $request)
	{
		$orderid = $request->orderid;
		$order = orders::find($orderid);
		$cusid = $order->cus_id;
		$orderdetail = DB::table('order_detail')->where('order_id',$order ->orderid)->get();
		$customer = DB::table('Customers')->where('cusid',$cusid)->first();
		return view('admin.order.considerorder',['order'=>$order,'orderdetail'=>$orderdetail,'customer'=>$customer]);	
	}
	public function  postConsider(Request $request)
	{

		$orderid = $request->orderid;
		$order = orders::find($orderid);
		if($order->status == 0){
			$order->status = 1;
			$order->save();
			return redirect('admin/order/consider')->with('messages','Accept successful');
		}else{
			echo "string";
		}
		
	}
	//report product 
	public function getReport()
	{
		return view('admin.order.reportorder');
	}
	public function postReport(Request $request)
	{
		$order_array= array();
		$orderdetail_array= array();
		$pro_array=  array();
		$sum1 =array();
		$date = $request->date;
		$dateformat = Carbon\Carbon::parse($date)->format('Y-m-d');
		$order_array = orders::where('dateimportorder',$dateformat)->get();
		//echo "string: ".$dateformat;
		$order_array = DB::table('orders')
						->join('order_detail', 'orders.orderid', '=', 'order_detail.order_id')
						->join('products', 'products.proid', '=', 'order_detail.pro_id')
						->where('dateimportorder', $dateformat)
						->selectRaw('pro_id, sum(quantity) as quantity')
						->selectRaw('products.proname ')
						->selectRaw('orders.orderid ')
						->selectRaw('(order_detail.unit_price * order_detail.quantity) as totalprice')
						->orderBy('quantity', 'DESC')
						->groupBy('order_detail.pro_id')->get();

		$ordertotal = DB::table('orders')
						->where('dateimportorder', $dateformat)
						->selectRaw('orderid, sum(totalprice) as totalprice')
						->get();
						//dd($ordertotal);
		return view('admin.order.viewreport',['order_array'=>$order_array,'date'=>$date,'ordertotal'=>$ordertotal]);
	}

	// public function getBestseller(){
        
 //        $bestsell = DB::table('order_detail')
 //        		->join('products', 'products.proid', '=', 'order_detail.pro_id')
 //        		->join('orders', 'orders.orderid', '=', 'order_detail.order_id')
 //                ->selectRaw('pro_id, sum(quantity) as sum')
 //                ->selectRaw('products.proname')
 //                ->selectRaw('orders.totalprice')
 //                ->orderBy('sum', 'DESC')
 //                ->groupBy('pro_id')
 //                ->take(3)
 //                ->get();
 //        //dd($bestsell);
 //        return view('admin.order.bestseller',['bestsell'=>$bestsell]);
 //    }

    public function getorderAdaypdf(Request $request)
    {
    	$order_array= array();
		$orderdetail_array= array();
		$pro_array=  array();
		$sum1 =array();
		$date = $request->date;
		$dateformat = Carbon\Carbon::parse($date)->format('Y-m-d');
		$order_array = orders::where('dateimportorder',$dateformat)->get();

		$order_array = DB::table('orders')
						->join('order_detail', 'orders.orderid', '=', 'order_detail.order_id')
						->join('products', 'products.proid', '=', 'order_detail.pro_id')
						->where('dateimportorder', $dateformat)
						->selectRaw('pro_id, sum(quantity) as quantity')
						->selectRaw('products.proname ')
						->selectRaw('orders.orderid ')
						->selectRaw('(order_detail.unit_price * order_detail.quantity) as totalprice')
						->orderBy('quantity', 'DESC')
						->groupBy('order_detail.pro_id')->get();

		$ordertotal = DB::table('orders')
						->where('dateimportorder', $dateformat)
						->selectRaw('orderid, sum(totalprice) as totalprice')
						->get();
    	 $pdf = PDF::loadView('admin.order.pdf',['order_array'=>$order_array,'date'=>$date,'ordertotal'=>$ordertotal]);
    	 return $pdf->download('report.pdf');
    }


}
