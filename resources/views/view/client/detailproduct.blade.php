@extends('view.layout.index')

@section('content')

<div class="center_content">
  <div class="center_title_bar">Chi Tiet san Pham</div>
     
      <div class="prod_box_big">
        <div class="top_prod_box_big"></div>

        <div class="center_prod_box_big">
          <div class="product_img_big"> 
          	<a href="javascript:popImage('images/big_pic.jpg','Some Title')" title="header=[Zoom] body=[&nbsp;] fade=[on]">
          		
              <?php $imge = DB::table('images')->where('pro_id',$product['proid'])->first(); ?>
              <img width="180" height="207" src="admin_asset/upload/images/san-pham/{{$imge->img_name}}"/>
          	</a>
            <div class="thumbs"> 
            	<a href="#" title="header=[Thumb1] body=[&nbsp;] fade=[on]">
            		<img src="thu/images/thumb1.gif" alt="" border="0" />
            	</a> 
            	<a href="#" title="header=[Thumb2] body=[&nbsp;] fade=[on]">
            		<img width="158" height="207" src="" alt="" border="0" />
            	</a> 
            	<a href="#" title="header=[Thumb3] body=[&nbsp;] fade=[on]">
            		<img src="thu/images/thumb1.gif" alt="" border="0" />
            	</a> 
            </div>
          </div>
          <div class="details_big_box">
            <div class="product_title_big">{{$product ->proname}}</div>
            
              Hãng Sản Xuất: <span class="blue">{{$product ->made->madename}}</span><br />
              Thể Loại: <span class="blue">{{$product ->category->catename}}</span><br />
              <div class="specifications"> Description: <span class="blue">{{$product ->description}}</span><br />
            </div>
            <div class="prod_price_big"><span class="price">Giá: {{$product ->price}}VND</span></div>
        </div>
        <div class="bottom_prod_box_big"></div>
      </div>

      <div class="center_title_bar">Sản Phẩm Cùng Loại</div>
       
            @foreach($pro as $pro)
              <div class="prod_box">
                <div class="top_prod_box"></div>
                <div class="center_prod_box">
                  <div class="product_title"><a href="customer/showall/detailproduct/{{$pro->proid}}">{{$pro -> proname}}</a></div> 
                  <div class="product_img">
                  <a href="customer/showall/detailproduct/{{$pro->proid}}">
                    <?php $imge = DB::table('images')->where('pro_id',$pro['proid'])->first(); ?>
                    <img width="180" height="207" src="admin_asset/upload/images/san-pham/{{$imge->img_name}}"/>
                  </a></div>
                  <div class="prod_price" ><span class="price">Giá:{{$pro ->price}}VND</span></div>
                </div>
                <div class="bottom_prod_box"></div>
                <div class="prod_details_tab"> 
                  <a href="#" title="header=[Add to cart] body=[&nbsp;] fade=[on]">
                    <img src="thu/images/cart.gif" alt="" border="0" class="left_bt" />
                  </a> 
                  <a href="#" title="header=[Specials] body=[&nbsp;] fade=[on]">
                    <img src="thu/images/favs.gif" alt="" border="0" class="left_bt" />
                  </a> 
                  <a href="#" title="header=[Gifts] body=[&nbsp;] fade=[on]">
                    <img src="thu/images/favorites.gif" alt="" border="0" class="left_bt" />
                  </a> 
                  <a href="customer/showall/detailproduct/{{$pro->proid}}" class="prod_details">details</a> 
                </div>
              </div>
          @endforeach
    </div>
    @endsection