<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\products;
class CategoryController extends Controller
{
    public function getlistCate()
    {
       
         $cate = Category::paginate(5);
    	
    	return view('admin.category.listcategory',['list'=>$cate]);
    }
    public function getAdd()
    {
    	return view('admin.category.addcategory');
    }
    //save catedory
    public function postAdd(Request $request)
    {
        //validate
        $this->validate($request,
            [
                'catename' => 'required|min:5|max:20'
            ]
            ,
            [
                'catename' => 'Please input category name ',
                'catename.unique' => 'Category name was existed',
                'catename.min' => 'Category name must great than 5 characters ',
                'catename.max' => 'Category name is less than 30 characters'
            ]);
        //declare Category 
        $cate = new Category;
        $cate ->catename = $request->catename;
        //save category
        $cate ->save();
        //redirect to add page and out put message
        return redirect('admin/category/addcategory') ->with('messages','Add category Successfull');
    }

    //find id in database then show on edit page
    public function getEdit($cateid)
    {
        //find id of category
    	$cate = Category::find($cateid);
        return view('admin.category.editcategory',['cate' => $cate]);
    }
    //edit category
    public function postEdit(Request $request,$cateid)
    {
        //find id of category
        $cate = Category::find($cateid);
        //validate
        $this->validate($request,
            [
                'catename' => 'required|min:5|max:20'
            ]
            ,
            [
                'catename' => 'Please input category name ',
                'catename.unique' => 'Category name was existed',
                'catename.min' => 'Category name must great than 5 characters ',
                'catename.max' => 'Category name is less than 30 characters'
            ]);
        $cate ->catename = $request->catename;
        //save category
        $cate ->save();
        //redirect to edit page and out put message
        return redirect('admin/category/editcategory/'.$cateid) ->with('messages','Edit category successfull');
    }

    //delete  category by id
    public function getDeletemade($cateid){
        //find id in category
        $cate = Category::find($cateid);

        //delete
       	// $pro = Product::where('catid', '=', $id)->get();
        $pro = products::where('cate_id','=',$cateid)->get();
        //if 
        if($pro->isEmpty()){
            $cate ->delete(); 
        }else{
              return redirect('admin/category/listcategory') ->with('messages','Can not delete category');
        };
        // //redirect to list category page and out put message
        return redirect('admin/category/listcategory') ->with('messages','Delete category successfull');
    }
}
