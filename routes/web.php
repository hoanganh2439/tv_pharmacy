<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('admin/login','AdminController@getloginAdmin');
Route::post('admin/login','AdminController@loginAdmin');

Route::get('admin/logout','AdminController@getLogout');

//login by Facebook
Route::get('googlelogin', 'Auth\SocialController@redirectToProvider');
Route::get('googlelogin/callback', 'Auth\SocialController@handleProviderCallback');

Route::group(['prefix' =>'admin','middleware' =>'adminlogin'],function(){
	Route::group(['prefix' =>'payment'],function(){

		Route::get('addpayment','PaymentController@getAdd');
		Route::post('addpayment','PaymentController@postAdd');

		Route::get('listpayment','CategoryController@getList');
	});

	Route::group(['prefix' =>'category'],function(){

		Route::get('addcategory','CategoryController@getAdd');
		Route::post('addcategory','CategoryController@postAdd');

		Route::get('listcategory','CategoryController@getlistCate');

		Route::get('deletecategory/{cateid}','CategoryController@getDelete');
		Route::post('search','CategoryController@getSearch');

		Route::get('editcategory/{cateid}','CategoryController@getEdit');
		Route::post('editcategory/{cateid}','CategoryController@postEdit');
	});

	Route::group(['prefix' =>'made'],function(){
		Route::get('listmade','MadeController@getlistMade');

		Route::get('editmade/{id}','MadeController@getEdit');
		Route::post('editmade/{id}','MadeController@postEdit');

		Route::get('addmade','MadeController@getAdd');
		Route::post('addmade','MadeController@postAdd');
		Route::get('deletemade/{cateid}','MadeController@getDeletemade');
	});

	Route::group(['prefix' =>'product'],function(){
		Route::get('listproduct','ProductController@getlistPro');

		Route::get('editproduct/{proid}','ProductController@getEditPro');
		Route::post('editproduct/{proid}','ProductController@postEdit');

		Route::get('addproduct','ProductController@getAddPro');
		Route::post('addproduct','ProductController@postAdd');

		Route::get('deleteproduct/{proid}','ProductController@getDelete');
		Route::post('deleteproduct/{proid}','ProductController@postDelete');

		Route::post('search','ProductController@getSearch');

		

	});

	Route::group(['prefix' =>'order'],function(){
		Route::get('listorder','OrderController@getlistOrder');

		Route::get('consider/{orderid}','OrderController@getConsider');
		Route::post('consider/{orderid}','OrderController@postConsider');

		Route::get('report','OrderController@getReport');
		Route::post('report','OrderController@postReport');
		Route::get('pdf/{date}','OrderController@getorderAdaypdf');
		Route::get('bestseller','OrderController@getBestseller');
		
	});

	Route::group(['prefix' =>'user'],function(){
		Route::get('listuser','AdminController@getlistUser');

		Route::get('editUser/{id}','AdminController@getEditUser');
		Route::post('editUser/{id}','AdminController@postEditUser');

		Route::get('adduser','AdminController@getAddUser');
		Route::post('adduser','AdminController@postUser');

		Route::get('deleteUser/{id}','AdminController@getDeleteUser');
		Route::post('deleteUser/{id}','AdminController@postDeleteUser');

		Route::post('search','AdminController@getSearch');

	});
	


});
Route::group(['prefix'=>'customer'],function(){
	Route::group(['prefix'=>'showall'],function(){
		Route::get('show','ShowController@getCategory');

		//Route::get('detail/{id}','ShowController@getDetail');
		Route::get('product','ShowController@getproduct');
		
		Route::get('typepcate/{id}','ShowController@getTypeCategory');

		Route::get('detailproduct/{proid}','ShowController@getDetail');

		Route::get('typemade/{id}','ShowController@getTypeMade');
		Route::get('contact','ShowController@getContact');
		Route::post('contact','ShowController@postContact');


		Route::get('sannphamcungloai','ShowController@getproductsametype');	
		Route::get('aboutus','ShowController@getaboutus');
		Route::get('medicalknowledge','ShowController@getKienthuc');

		Route::post('search/','ShowController@getSearch');
		
		Route::get('cancer','ShowController@getUngthu');
		Route::get('vegetables','ShowController@getRauma');
		Route::get('thuochasot','ShowController@getThuochasot');
		Route::get('nutrition','ShowController@getDinhduong');

		Route::get('muaghang/{proid}','ShowController@getMuahang');

		
		
		Route::get('deleteshop/{rowId}','ShowController@getDeleteshop');
		Route::get('editshop/{rowid}/{qty}','ShowController@editShop');
		Route::get('checkout/{id}','ShowController@getCheckout');

		Route::get('giohang','ShowController@getGiohang');
		Route::post('giohang','ShowController@postGiohang');
		
		Route::get('inforcus_cart','ShowController@getInforcus_cart');
		Route::post('inforcus_cart','ShowController@postInforcus_cart');

	});

	Route::group(['prefix'=>'account'],function(){
		Route::get('register','CustomerController@getRegister');
		Route::post('register','CustomerController@postRegister');
		Route::get('login','CustomerController@getLogin');
		Route::post('login','CustomerController@postlogin');
		Route::get('logout','CustomerController@getlogout');
		Route::get('editprofile','CustomerController@getProfile');
		Route::post('editprofile/{id}','CustomerController@postProfile');
		Route::get('changepass','CustomerController@getChange');
		Route::post('changepass/{email}','CustomerController@postChange');
	});
	
});


