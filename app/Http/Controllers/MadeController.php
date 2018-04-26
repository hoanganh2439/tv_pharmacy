<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\mades;
use App\products; 
use DB;  
class MadeController extends Controller
{
    public function getlistMade()
    {
       
        $made = mades::paginate(5);
    	return view('admin.made.listmade',['list'=>$made]);
    }

    //show add page
	public function getAdd()
    {
    	return view('admin.made.addmade');
    }
    //save catedory
    public function postAdd(Request $request)
    {
        //validate
        $this->validate($request,
            [
                'madename' => 'required|min:5|max:20'
            ]
            ,
            [
                'madename' => 'Please input made name',
                'madename.unique' => 'Made name existed',
                'madename.min' => 'Made name must great than 5 characters',
                'madename.max' => 'Made name  less than 20 characters'
            ]);
        //declare made
        $made = new mades;
        $made ->madename = $request->madename;
        //save made
        $made ->save();
        //redirect to add page and out put message
        return redirect('admin/made/addmade') ->with('messages','Add Made Successfull');
    }


    //edit made
    public function getEdit($id)
    {
        //find id of category
    	$made = mades::find($id);
        return view('admin.made.editmade',['made' => $made]);
    }
    //edit made
    public function postEdit(Request $request,$id)
    {
        //find id of made
        $made = mades::find($id);
        //validate
        $this->validate($request,
            [
                'madename' => 'required|min:5|max:20'
            ]
            ,
            [
                'madename' => 'Please input made name',
                'madename.unique' => 'Made name existed',
                'madename.min' => 'Made name must great than 5 characters',
                'madename.max' => 'Made name  less than 20 characters'
            ]);
        $made ->madename = $request->madename;
        //save made
        $made ->save();
        //redirect to edit page and out put message
        return redirect('admin/made/editmade/'.$id) ->with('messages','Edit successful');
    }

//delete made
     public function getDeletemade($id){
        //find id in category
        $made = mades::find($id);
        //delete
        $pro = DB::table('products')->where('made_id',$id)->first();
        //echo "string: ".$pro->made_id;
        if(!empty($pro)){
            return redirect('admin/made/listmade') ->with('messages','Not delete');
        }else{
            $made ->delete();   
            return redirect('admin/made/listmade') ->with('messages','Delete successful');
        };
    }
}
