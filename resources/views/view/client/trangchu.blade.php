@extends('view.layout.index')

@section('content')
  <div class="center_content">
      <div class="center_title_bar">Sản Phẩm Mới</div>
     @foreach($pro1 as $pr)
      <div class="prod_box">
        <div class="top_prod_box"></div>
        <div class="center_prod_box">
          <div class="product_title"><a href="customer/showall/detailproduct/{{$pr->proid}}">{{$pr -> proname}}</a></div>
          <div class="product_img">
            <a href="customer/showall/detailproduct/{{$pr->proid}}">
              <?php $imge = DB::table('images')->where('pro_id',$pr['proid'])->first(); ?>
              <img style="width:100px;height:70px" src="admin_asset/upload/images/san-pham/{{$imge->img_name}}"/>
            </a>
          </div>
        </div>
        <div class="bottom_prod_box"></div>
        <div class="prod_details_tab"> 
          <a href="#" title="header=[Add to cart] body=[&nbsp;] fade=[on]">
            <img src="thu/images/cart.gif" alt="" border="0" class="left_bt" /></a> 
            <a href="#" title="header=[Specials] body=[&nbsp;] fade=[on]">
              <img src="thu/images/favs.gif" alt="" border="0" class="left_bt" /></a> 
              <a href="#" title="header=[Gifts] body=[&nbsp;] fade=[on]">
                <img src="thu/images/favorites.gif" alt="" border="0" class="left_bt" /></a> 
                <a href="customer/showall/detailproduct/{{$pr->proid}}" class="prod_details">details</a> 
        </div>
      </div>
      @endforeach
      
      <div class="center_title_bar" >Danh Sách Sản Phẩm</div>
       @foreach($pro as $pr)
        <div class="prod_box">
          <div class="top_prod_box"></div>
          <div class="center_prod_box">
            <div class="product_title"><a href="details.html">{{$pr -> proname}}</a></div>
            <div class="product_img">
              <a href="customer/showall/detailproduct/{{$pr->proid}}" >
                <?php $imge = DB::table('images')->where('pro_id',$pr['proid'])->first(); ?>
                <img style="width:100px;height:70px" src="admin_asset/upload/images/san-pham/{{$imge->img_name}}"/>
              </a>
            </div>
          </div>
          <div class="bottom_prod_box"></div>
        <div class="prod_details_tab"> 
          <a href="#" title="header=[Add to cart] body=[&nbsp;] fade=[on]">
            <img src="thu/images/cart.gif" alt="" border="0" class="left_bt" /></a> 
            <a href="#" title="header=[Specials] body=[&nbsp;] fade=[on]">
              <img src="thu/images/favs.gif" alt="" border="0" class="left_bt" /></a> 
              <a href="#" title="header=[Gifts] body=[&nbsp;] fade=[on]">
                <img src="thu/images/favorites.gif" alt="" border="0" class="left_bt" /></a> 
                <a href="customer/showall/detailproduct/{{$pr->proid}}" class="prod_details">details</a> </div>
        </div>
       @endforeach
    {!!$pro ->links()!!}
    </div>

@endsection
