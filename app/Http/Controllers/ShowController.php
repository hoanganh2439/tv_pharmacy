<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\products;
use App\Category;
use App\User;
use App\mades;
use App\images;
use App\orders;
use App\orderdetail;
use App\Customers;
use App\payments;
use App\token_server;
use DB,Cart,Carbon,Mail;
class ShowController extends Controller
{
    public function getCategory()
    {
        $made = mades::all();
        $cate = Category::all();
       // $list = products::with('category')->get();
        $pro = products::paginate(6);
        $pro1 = products::orderBy('proid','desc')->take(4)->get();
        return view('viewall.customer.home',['cate'=>$cate,'pro' => $pro,'pro1' => $pro1,'made' => $made]);
    }
    public function getTypeCategory(Request $request,$id)
    {
        $made = mades::all();
        $cate = Category::all();
        $listgen = DB::table('products')->where('cate_id',$id)->get();
        $listp = DB::table('products')->where('cate_id',$id)->paginate(6);
        return view('viewall.customer.product', ['listgen'=>$listgen,'listp' => $listp,'cate'=>$cate,'made' => $made]);
    }

    //Tìm sản phẩm của hãng
    public function getTypeMade(Request $request,$id)
    {
        $made = mades::all();
        $cate = Category::all(); 
        $listgen = DB::table('products')->where('made_id',$id)->get();
        $listp = DB::table('products')->where('made_id',$id)->paginate(6);
        return view('viewall.customer.madeproduct', ['listgen'=>$listgen,'cate'=> $cate,'listp' => $listp,'made' => $made]);
    }
    public function getDetail(Request $request,$proid)
    {
        $made = mades::all();
        $product = products::find($proid);
        $cate = Category::all();
        $pro = products::where('cate_id','like',$product->cate_id)->get();
        $pronew = products::orderBy('proid','desc')->take(3)->get();
        return view('viewall.customer.detailproduct',['pronew'=>$pronew,'pro' => $pro,'product' => $product,'cate'=>$cate,'made' =>$made]);
    }

    public function getproduct(){
        $made = mades::all();
        $pro = products::paginate(6);
        $cate = Category::all();
        return view('viewall.customer.product',['cate'=>$cate,'listp' => $pro,'made' => $made]);
    }

    //lien he
    public function getContact()
    {
        $made = mades::all();
        $cate = Category::all();
        $pro = products::paginate(6);
        return view('view.client.contact',['cate' => $cate,'made' => $made,'pro'=>$pro]);
    }

    public function postContact(Request $request){
        $this->validate($request,
            [
            'name' => 'required|min:3|max:30',
            'email' => 'required|min:3|max:30',
            'phone' => 'required|min:3|max:30',
            'noidung' => 'required|min:3|max:1000',
            ]
            ,
            [
            'name' => 'Chưa nhập tên thể loại',

            ]);

        $lienhe = new lienhe();
        $lienhe -> cusname = $request ->name;
        $lienhe -> email = $request ->email;
        $lienhe -> phone = $request ->phone;
        $lienhe -> noidung = $request ->noidung;
        $lienhe -> save();
        return redirect('khachhang/xem/lienhe') ->with('messages','Gửi tin nhắn thành công');
    }  
    public function getTimkiem()
    {
        $made = mades::all();
        $cate = Category::all();
        return view('client.product.search');
    }

    public function getaboutus()
    {
        $cate = Category::all();
        $made = mades::all();
        $pro = products::paginate(6);
        return view('viewall.customer.aboutus',['cate' => $cate,'made' => $made,'pro'=>$pro]);
    }

    public function getKienthuc()
    {
     $cate = Category::all();
     $made = mades::all();
     $pro = products::paginate(6);
     return view('view.client.medicalknowledge',['cate' => $cate,'made' => $made,'pro' => $pro]);
 }

 public function getSearch(Request $request)
 {  
    $all = $request->all;
    $showllall = products::where('proname','like',"%$all%")->orWhere('price','like',"%$all%")->paginate(6);
    $made = mades::all();
    $cate = Category::all();
    return view('viewall.customer.searchresult',['cate' => $cate,'made' => $made,'showllall' => $showllall]);
}

public function getUngthu()
{
    $cate = Category::all();
    $made = mades::all();
    return view('view.kienthuc.ungthu',['cate' => $cate,'made' => $made]);
}
public function getRauma()
{
    $cate = Category::all();
    $made = mades::all();
    return view('view.kienthuc.rauma',['cate' => $cate,'made' => $made]);
}

public function getThuochasot(){
    $cate = Category::all();
    $made = mades::all();
    return view('view.kienthuc.thuochasot',['cate' => $cate,'made' => $made]);
}

public function getDinhduong()
{
    $cate = Category::all();
    $made = mades::all();
    return view('view.kienthuc.dinhduong',['cate' => $cate,'made' => $made]);
}

public function getMuahang(Request $request,$proid)
{
    $proid = $request->proid;
    $pro_by = DB::table('products')->where('proid',$proid)->first();
    $img_by = DB::table('images')->where('pro_id',$proid)->first();


    Cart::add(array('id'=>$proid,'name'=>$pro_by->proname,
        'price'=>$pro_by->price ,'qty'=>1,
        'options'=>array('img'=>$img_by->img_name)
        ));

    return redirect('customer/showall/giohang');
}


public function getDeleteshop(Request $request,$rowId)
{

    Cart::remove($rowId);
    return redirect('customer/showall/giohang');
}

public function editShop(Request $request,$rowid,$qty)
{
    if($request->ajax()){
        $product11 = Cart::get($rowid);
        $id = $request->rowid;
        $qty = $request->qty;
        $productid = $product11->id;
        $pro11 = DB::table('products')->where('proid',$productid)->where('quanlity','<',$qty)->first();
        if($qty <= 100){
            if(!$pro11){
                Cart::update($id,$qty);
                echo "Update quantity success";
            }else{
               echo "The quantity purchased is greater than the quantity in stock";
           } 
       }else{
        echo "You can only buy 100 items a day";
        
    }
}
}

public function getGiohang(Request $request)
{
    $cate = Category::all();
    $made = mades::all();
    $content = Cart::content();
    $subtotal = Cart::subtotal();
    $qty = $request->quan;
    return view('viewall.customer.shoppingcart',['subtotal'=>$subtotal,'content'=>$content,'cate' => $cate,'made' => $made]); 
}
public function postGiohang(Request $request)
{
    $cate = Category::all();
    $made = mades::all();
    $subtotal = Cart::subtotal();
    $pro = products::paginate(6);
    $pro1 = products::orderBy('proid','desc')->take(4)->get();
    $content = Cart::content();
    $cate = Category::all();
    $made = mades::all();
    if($content->isEmpty()){
        return redirect('customer/showall/giohang')->with('messages','Please chose buy product');

    }else{
       if($request->quan <=100){
        $abc = true;
        $bc= true;
        foreach ($content as $value) {
            $rowid = $value->rowId;
            $check_id = $value->id;
            $pro_check = products::find($check_id);
            $price_db = $pro_check->price;
            $price_cart = $value->price;
            $name_cart = $value->name;
                // if price of cart == price of database      
            if($price_cart != $price_db){
                Cart::update($rowid, ['price' => $price_db]);
                $abc =false; 
            }
        }
        foreach ($content as $value) {
            $rowid = $value->rowId;
            $check_id = $value->id;
            $pro_check = products::find($check_id);
            $proname_db = $pro_check->proname;
            $proname_cart = $value->name;
        //        echo "string".$proname_cart;
            if($proname_cart != $proname_db){
                Cart::update($rowid, ['name' => $proname_db]);
                $bc =false; 
            }
        }
        if($abc){
            if($bc){
                return view('viewall.customer.inforofcustommer',['subtotal'=>$subtotal,'content'=>$content,'cate' => $cate,'made' => $made]);
            }else{
                return redirect('customer/showall/giohang')->with('messages','Product name of product changed. Please check the price again');
            }

        }else{
            return redirect('customer/showall/giohang')->with('messages','Price of product changed. Please check the price again');
        }
    }
    else{
        return redirect('customer/showall/giohang')->with('messages','You can only buy 100 items a day. Please check quantity and click update.');
    }
}


}

public function getInforcus_cart(){
    $cate = Category::all();
    $made = mades::all();
    $content = Cart::content();
    $subtotal = Cart::subtotal();
    return view('viewall.customer.inforofcustommer',['subtotal'=>$subtotal,'content'=>$content,'cate' => $cate,'made' => $made]);
}
public function postInforcus_cart(Request $request){

    $pro = products::paginate(6);
    $pro1 = products::orderBy('proid','desc')->take(4)->get();
    $content = Cart::content();
    $cate = Category::all();
    $made = mades::all();
    $order = new orders;
    $subtotal = Cart::subtotal();
    $mytime = Carbon\Carbon::now();

    //create random
    $string = str_random(15);
    $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    // generate a pin based on 2 * 7 digits + a random character
    $pin = mt_rand(1000000, 9999999)
    . mt_rand(1000000, 9999999)
    . $characters[rand(0, strlen($characters) - 1)];
    // shuffle the result
    $token_radom = str_shuffle($pin);
    $email = $request->email;
    $cus = DB::table('customers')->where('email',$email)->first();
    if($cus == true){
        $totalprice = $request->totalprice;
        $payment = DB::table('payments')
        ->where('code_pay',$request->account)
        ->where('cvc',$request->cvc)
        ->first();
        foreach($content as  $value) {
            $total_cart = $value->qty * $value->price;
            if($total_cart > $payment->totalmoney){
                return redirect('customer/showall/inforcus_cart')->with('messages','Money not enough');
            }
            else{
                $else =  $payment->totalmoney - $total_cart;
                $payment = DB::table('payments')
                ->where('code_pay',$request->account)
                ->where('cvc',$request->cvc)
                ->first();
                $payid = $payment->pay_id;
                $pay = payments::find($payid);
                $pay ->totalmoney = $else;
                $pay->save();
                $toke_server = new token_server;
                $toke_server->token_string = $token_radom;
                $toke_server->totalpay = $else;
                $toke_server->save();
            }
        }
        $cusid = $cus->cusid;
        $order ->cus_id = $cusid;
        $order ->totalprice = $subtotal;
        $order ->dateimportorder = $mytime;
        $order ->token_payment = $token_radom;
        $order->save();
        foreach ($content as $value) {
            $orderdetail = new orderdetail;
            $orderdetail ->order_id = $order->orderid;
            $orderdetail ->pro_id = $value->id;
            $pr = products::find($value->id);

            $orderdetail->proname =$pr->proname;
            $orderdetail ->quantity = $value->qty;
            $orderdetail ->unit_price = $value->price;
            $orderdetail->save();

            $pid=$value->id;
            $cuid= $request->cusid;
            $proorder = products::find($pid);
            $data = [
            'email' => $email,
            'proname' => $proorder->proname,
            'quanlity' => $value->qty,
            'total' => $subtotal,
            'date' => $mytime
            ];
            Mail::send('viewall.customer.mail',$data,function($msg){
                $msg->from('hoanganh243987@gmail.com','thanh');
                $msg->to('hoanganh243987@gmail.com','hoanganh')->subject('Order of TV.Pharm Pharmaceutical JSC ');
            });
            echo "<script> alert('Your order has been saved ');</script>";
        }
        Cart::destroy();
        return view('viewall.customer.home',['pro'=>$pro,'pro1'=>$pro1,'cate' => $cate,'made' => $made]);
    }else{
        $cus = new Customers;
        $cus->email = $request->email;
        $cus->fullname = $request->fullname;
        $cus->address = $request->address;
        $cus->phonenumber = $request->phone;
        $cus->save();
        $cus = DB::table('customers')->where('email',$email)->first();
        $order ->cus_id = $cus->cusid;
        $order ->totalprice = $subtotal;
        $order ->dateimportorder = $mytime;
        $order->save();

        foreach ($content as $value) {
            $orderdetail = new orderdetail;
            $orderdetail ->order_id = $order->orderid;
            $orderdetail ->pro_id = $value->id;
            $pr = products::find($value->id);
            echo "string;".$pr->proname;
            $orderdetail->proname =$pr->proname;
            $orderdetail ->quantity = $value->qty;
            $orderdetail ->unit_price = $value->price;
            $orderdetail->save();
            $pid=$value->id;
            $cuid= $request->cusid;
            $proorder = products::find($pid);
            $data = [
            'email' => $request->email,
            'proname' => $proorder->proname,
            'quanlity' => $value->qty,
            'total' => $subtotal,
            'date' => $mytime
            ];
            Mail::send('viewall.customer.mail',$data,function($msg){
                $msg->from('hoanganh243987@gmail.com','thanh');
                $msg->to('hoanganh243987@gmail.com','hoanganh')->subject('Order of TV.Pharm Pharmaceutical JSC ');
            });
            echo "<script> alert('Your order has been saved ');</script>";
        }
        Cart::destroy();
        return view('viewall.customer.home',['pro'=>$pro,'pro1'=>$pro1,'cate' => $cate,'made' => $made]);
    }  
}

}
