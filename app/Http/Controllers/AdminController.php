<?php

namespace App\Http\Controllers;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Category;
class AdminController extends Controller
{
    public function getlistUser()
    {
          $user = User::all();
          return view('admin.user.listUser',['user'=>$user]);
    }

  

    public function getAddUser()
    {
        return view('admin.user.adduser');
    }
    //save catedory
    public function postUser(Request $request)
    {
         //validate
         $this->validate($request,
             [
               'username' => 'required|min:3|max:30',
               'password' => 'required|min:3|max:30',
               'email' => 'required|min:3|max:30',
               'dateofbirth' => 'required|min:3|max:30',
               'address' => 'required|min:3|max:30'
             ]
             ,
             [
                'username' => 'Please input username',
                'username.min' => 'Username phải có ít nhất 3 ký tự',
                'username.max' => 'Username chỉ có độ dài 30 ký tự',

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

             ]);
        //declare Category 
         $user = new User;
         $user->username = $request->username;
         $user->password = bcrypt($request->password);
         $user->level = $request->level;
         $user->email = $request->email;
         $user->dateofbirth = $request->dateofbirth;
         $user->address = $request->address;
         $user ->save();
        // //redirect to add page and out put message
         return redirect('admin/user/adduser') ->with('messages','Add successful');
    }
    //
    public function getloginAdmin()
    {
    	return view('admin.login');
    }
    public function loginAdmin(Request $request)
    {
      
         $username = $request['username'];
         $password = $request['password']; 
         $level = $request['level'];      
    // Try to log the user in.

      	  if(Auth::attempt(['username'=>$username,'password'=>$password,'level'=>$level]))
      	  {
                return redirect('admin/category/addcategory');
      	  }
      	  else{
      	     return redirect('admin/login')->with('messages','Please input username and password');
      	  }
    }  


    
    public function getLogout()
    {
      Auth::logout();
      return redirect('admin/login');
    } 
    //show adminprofile.blade.php
    public function getAdmin()
    {
      return view('admin.user.adminprofile');
    }
    //edit profile of admin
    public function postEditProfile(Request $request)
    {
      
      $username = $request['username'];
      $oldpassword = $request['oldpassword'];   
      $newpassword = $request['newpassword'];  
      $confirmpassword = $request['confirmpassword'];  
      $role = $request['role'];
      if(Auth::attempt(['password'=>$oldpassword]))  
      {
          if($newpassword == $confirmpassword)
          {
                if($oldpassword != $newpassword)
                {
                    $user = User::find(Auth::user()->id);
                    $user->username = $request->username;
                    $user->password = bcrypt($request->newpassword);
                    $user->role = $request->role;
                    $user ->save();
                    echo "Edit Okkkkkkkkk";
                }else{
                    echo "password old and new password the same";
                }
          }else{
              echo "new passwprd and confirm password not the same";
          }
          
      }else{
        echo "Password old not the same password on databse";
      } 
    }
}

