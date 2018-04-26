<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\products;
use App\Category;
use App\User;
use App\mades;
use App\images;
use App\Customers;
use DB,Mail;
use Session;
use Illuminate\Support\Facades\Auth;
class CustomerController extends Controller
{
    public function getRegister(){

    	$made = mades::all();
        $cate = Category::all();
    	return view('viewall.account.register',['cate'=>$cate,'made' => $made]);
    }
    public function postRegister(Request $request)
    {
		$this->validate($request,
             [
				'password' => 'required|min:3|max:30',
				'email' => 'required|min:3|max:30',
				'dateofbirth' => 'required|min:3|max:30',
				'address' => 'required|min:3|max:30',
				'fullname'=>'required|min:3|max:40',
				'phone' => 'required|numeric|min:12|max:13'

                    
             ]
             ,
             [
                'password' => 'Please input password',
	           'password.min' => 'Password phải có ít nhất 3 ký tự',
	           'password.max' => 'Password chỉ có độ dài 30 ký tự',

				'email' => 'Please input email',
	           'email.min' => 'Email phải có ít nhất 3 ký tự',
	           'email.max' => 'Email chỉ có độ dài 30 ký tự',

	           'dateofbirth' => 'Please input dateofbirth',
	           'dateofbirth.min' => 'dateofbirth phải có ít nhất 3 ký tự',
	           'dateofbirth.max' => 'dateofbirth chỉ có độ dài 30 ký tự',

	           'address' => 'Please input addess',
	           'address.min' => 'address phải có ít nhất 3 ký tự',
	           'address.max' => 'address chỉ có độ dài 30 ký tự',

	           'phone' => 'Please input phone number',
	           'phone.min' => 'phone phải có ít nhất 10 so',
	           'phone.max' => 'phone chỉ có độ dài 12 ký tự',
	           'phone.numeric'=>'Phone must be number',

         ]);
		// $made = mades::all();
	 //    $cate = Category::all();
	 //    $cus = new Customers;
	    
	 //    $Email = $request->email;
	     
	 //    $cuss = Customers::where('email','=',$Email)->get();
	 //    if($cuss->isEmpty()){
	 //     	$cus->password = $request->pass;
	 //     	$cus ->email = $request->email;
	 //     	$cus->dateofbirth = $request->dateofbirth;
		//     $cus->address = $request->address;
		//     $cus->fullname = $request->fullname;
		//     $cus->phonenumber = $request->phone;
		//     $em=$request->email;
		//     echo "<script> alert('Your order has been saved ');</script>";
	 //     	$cus ->save();
	 //     	$data = ['hoten'=>'hoang anh'];
	 //     	Mail::send('viewall.account.mailregister',$data,function($msg) use ($em){
	     		
  //                   $msg->from('hoanganh243987@gmail.com','thanh');
  //                   $msg->to($em)->subject('You had member of TV.Pharm Pharmaceutical JSC. Please check mail');
  //               });
  //      //      echo "<script> alert('Your order has been saved ');</script>";
	 //     	return redirect('customer/account/login') ->with('messages','Register success');
	 //    }else{
echo "string";
	     	//return redirect('customer/account/register') ->with('messages','Email is exists. Please again input');
	   // }    
	}
	public function getlogin()
	{
		$made = mades::all();
        $cate = Category::all();
    	return view('viewall.account.login',['cate'=>$cate,'made' => $made]);
	}
	public function postlogin(Request $request)
	{
        $email = $request['email'];
        $password = $request['pass']; 
       	$cus = Customers::where('email','=',$email)->where('password','=',$password)->get();
       	$cus_find = DB::table('Customers')->where('email',$email)->first();
	  	if($cus->isEmpty())
	  	{
	  		return redirect('customer/account/login')->with('messages','Username and password is wrong. Please input again');
	  	}
	  	else{
	  		$made = mades::all();
        	$cate = Category::all();
	  		$pro = products::paginate(6);
        	$pro1 = products::orderBy('proid','desc')->take(4)->get();
	  		//Session::set('cus',$cus);
	  		$fullname = $cus_find->fullname;
	  		$address = $cus_find->address;
	  		$phone = $cus_find->phonenumber;
	  		$request->session()->put('email', $email);
	  		
	  		$request->session()->put('address', $address);
	  		$request->session()->put('phone', $phone);
	  		$request->session()->put('fullname', $fullname);
	  		 //echo "string: ".$fullname;
	  		return view('viewall.customer.home',['cate'=>$cate,'pro' => $pro,'pro1' => $pro1,'made' => $made,'cus'=>$cus])->with('email',$email);
	  	}
	}
	public function getlogout()
	{
		Session::flush();
		return redirect('customer/showall/show');
	}
	public function getProfile(Request $request)
    {
    	$made = mades::all();
    	
		$value = $request->session()->has('email') ;
		$email = Session::get('email');
		$cus = DB::table('Customers')->where('email',$email)->first();
        $cate = Category::all();
        return view('viewall.account.editprofile',['cus'=>$cus,'cate'=>$cate,'made' => $made]);
    }
    public function postProfile(Request $request)
    {
    	$cus_id = $request->id;
    	$made = mades::all();
    	$cate = Category::all(); 
    	$cus = Customers::find($cus_id);
    	$email = $cus->email;
    	$cus ->address = $request->address;
    	$cus ->phonenumber = $request->phone;
        $cus ->save();
        return view('viewall.account.changepassword',['cus'=>$cus,'made'=>$made,'cate'=>$cate,'email'=>$email]);
    }

    public function getchange(Request $request)
    {
    	$email = Session::get('email');
    	$made = mades::all();
    	$cate = Category::all();
    	$cus = DB::table('Customers')->where('email',$email)->first();
    	return view('viewall.account.changepassword',['cus'=>$cus,'made'=>$made,'cate'=>$cate]);
    }
    public function postChange(Request $request)
    {
    	$email = $request->email;
    	$oldpass = $request->oldpass;
    	$newpass = $request->newpass;
    	$confpass = $request->confpass;
    	$cus = DB::table('customers')->where('email',$email)->first();
    	$pass_db = $cus->password;
    	$proid_db = $cus->cusid;
    	if($oldpass != $pass_db){
    		return redirect('customer/account/changepass')->with('messages','Input wrong password');
    	}
    	if($oldpass == $newpass){
    		return redirect('customer/account/changepass')->with('messages','Old password and new password not the same');
    	}
    	if($newpass != $confpass){
    		return redirect('customer/account/changepass')->with('messages','New password and confirm password must be the same');
    	}else{
    		$cus= Customers::find($proid_db);
    		$cus ->password = $request->newpass;
    		$cus ->save();
    		return redirect('customer/account/changepass')->with('message','Change password success');
    	}
    	
    }
}
