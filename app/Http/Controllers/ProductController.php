<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\products;
use App\Category;
use App\User;
use App\mades;
use App\images;
use DB,Trim;
use Carbon\Carbon;
use Illuminate\Support\Facades\Input;
class ProductController extends Controller
{
    public function getAddPro()
    {
        //get all type category in database
        $cate = Category::all();
        $made = mades::all();
        //return page addproduct.balde.php 
        return view('admin.product.addproduct',['category'=>$cate,'made' => $made]);
    }
    public function postAdd(Request $request)
    {
        //validate
         $this->validate($request,
             [
                 'proname' => 'required|min:5|max:68',
                 'price' => 'required|numeric|min:1|max:1000000',
                 'quanlity' => 'required|numeric|min:1|max:300',
                 'description' => 'required|min:10|max:10000',
                    
             ]
             ,
             [
                 'proname' => 'Please input name of product',
                 'proname.min' => 'Product name must great than 5 characters',
                 'proname.max' => 'Product name is less than 60 characters',
                 'price' => 'Please input Price',
                 'price.min' => 'Price must be great than 0',
                 'price.max' => 'Price must be less or equal 1000,000',
                 'quanlity' => 'Please input quanlity',
                 'quanlity.min' => 'Price must be great than 0',
                 'quanlity.max' => 'Price must be less or equal 300',
                 'description' =>'Please input name of description',
                 'description.min' => 'Description must be great than 5 characters',
                 'description.max' => 'Description must be less or equal 150 characters',
         ]);
        //declare Product
        $pro = new products;
        $proname_strim = preg_replace('/\s\s+/', ' ', $request->proname);
        $pro->proname = $proname_strim;
        $pro->price = $request->price;
        $pro->cate_id = $request->category;
        $pro->made_id = $request->made;
        $pro->status = 1;
        $pro->quanlity = $request->quanlity;
        $description_strim = preg_replace('/\s\s+/', ' ', $request->description);
        $pro->description = $request->description;
        // $current_time = Carbon::now()->format('d-m-Y');
        // $pro->dateimport = $current_time;
        $pro->user_id = $request->idadmin;
        if($request->hasFile('images'))
        {
            //echo "da co file";
            $file = $request->file('images');
            $duoi = $file->getClientOriginalExtension();
            if($duoi !='jpg' && $duoi!='JPG' && $duoi != 'png' && $duoi != 'jpeg' && $duoi != 'PNG' && $duoi != 'JPEG'){
                return redirect('admin/product/addproduct') ->with('messages','Images must be .jpg or .png or .jpeg');
            }
            $name = $file->getClientOriginalName();
            $pro->save();
            $image = new images;
            $image->img_name = $name;
            $image->pro_id = $pro->proid;
            $file ->move("admin_asset/upload/images/san-pham/",$name);
            $image->save();
            return redirect('admin/product/addproduct') ->with('messages','add product successfull');
        }else{
            $pro->images="";
           return redirect('admin/product/addproduct') ->with('messages','You must be chose images');
        }
    }
    //use to get all Product 
    public function getlistPro()
    {
        //get all product
        $list = products::paginate(3);

    	return view('admin.product.listproduct',['list'=>$list]);
    }
    //get imformation of product and display on edit page
    public function getEditPro($proid)
    {
        //get all category
    	$cate = Category::all();
        //find id of product
    	$pro = products::find($proid);
        $made = mades::all();
        //redirect to edit page
       
    	return view('admin.product.editproduct',['pro' =>$pro,'cate'=>$cate,'made'=>$made]);
    }
    // save edit product
    public function postEdit(Request $request,$proid)
    {
        ////find id of product
    	$pro = products::find($proid);
        //validate
    	$this->validate($request,
             [
                 'proname' => 'required|min:5|max:68',
                 'price' => 'required|numeric|min:1|max:1000000',
                 'quanlity' => 'required|numeric|min:1|max:300',
                 'description' => 'required|min:10|max:10000',
                    
             ]
             ,
             [
                 'proname' => 'Please input name of product',
                 'proname.min' => 'Product name must great than 5 characters',
                 'proname.max' => 'Product name is less than 60 characters',
                 'price' => 'Please input Price',
                 'price.min' => 'Price must be great than 0',
                 'price.max' => 'Price must be less or equal 1000,000',
                 'quanlity' => 'Please input quanlity',
                 'quanlity.min' => 'Price must be great than 0',
                 'quanlity.max' => 'Price must be less or equal 300',
                 'description' =>'Please input name of description',
                 'description.min' => 'Description must be great than 5 characters',
                 'description.max' => 'Description must be less or equal 150 characters',
         ]);
        $proname_strim = preg_replace('/\s\s+/', ' ', $request->price);
        $pro->price = $proname_strim;
        $pro->cate_id = $request->category;
        $pro->made_id = $request->made;
        $pro->status = $request->status;
        $pro->quanlity = $request->quanlity;
        $description_strim = preg_replace('/\s\s+/', ' ', $request->description);
        $pro->description = $description_strim;
        if($request->hasFile('images'))
        {
            //echo "da co file";
            $file = $request->file('images');
            $duoi = $file->getClientOriginalExtension();
            if($duoi !='jpg' && $duoi!='JPG'&& $duoi != 'png' && $duoi !='PNG' && $duoi != 'jpeg' && $duoi != 'JPEG'){
              return redirect('admin/product/editproduct/'.$proid) ->with('messages','Images must be .jpg or .png or .jpeg');
            };
            $name = $file->getClientOriginalName();
            $image = DB::table('images')->where('pro_id',$proid)->get();
            if(isset($image)) {
                foreach ($image as $image){
                   // $image->pro_id = $pro->proid;
                    $file ->move("admin_asset/upload/images/san-pham/",$name);
                    
                    unlink('admin_asset/upload/images/san-pham/'.$image->img_name);
                 //  echo "string: ".$image->img_name;
                    $image = images::find($image->imgid);
                    $image->img_name = $name;
                    $pro->save(); 
                    $image->save();
                    return redirect('admin/product/editproduct/'.$proid) ->with('messages','Edit product Successfull');
                }   
            }
        }else{
            $pro->images= "";
            // $proid = $pro->proid;
            // $image = DB::table('images')->where('pro_id',$proid)->first();
            // //echo "string ". $image->imgid;
            // $pro->save(); 
            // echo "string";
            return redirect('admin/product/editproduct/'.$proid) ->with('messages','Please chose images');
        }
    }
    //Delete Product
    public function getDelete($proid){
        //find product by id
        $pro = products::find($proid);
        $cate = Category::all();
        $made = mades::all();
        //redirect to listPro page and output message
        return view('admin/product/deleteproduct',['pro'=>$pro,'cate'=>$cate,'made'=>$made]);
    }
    //Delete Product
    public function postDelete($proid){
        //find product by id
        $pro = products::find($proid);

        //delete product
        $pro ->delete();
        //redirect to listPro page and output message
        return redirect('admin/product/listproduct') ->with('messages','Đã Xóa sản phẩm thành công');
     }
    //search Product by name
    public function getSearch(Request $request)
    {
        $cate = Category::all();
        $id = $request->id;
        $made = mades::all();
        $pro = products::where('proname','like',"%$id%")->get();
        return view('admin.product.search_product',['pro'=>$pro,'cate'=>$cate,'made'=>$made]);
       // echo "string";
    }

    
}
