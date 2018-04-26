    <div class="left_content">
      <div class="title_box">Loại Sản Phẩm</div>
      <ul class="left_menu" >
       @foreach($cate as $cate)
          <li class="odd"><a href="customer/showall/typeproduct/{{$cate ->cateid}}">{{$cate -> catename}}</a></li>
        @endforeach
      </ul>
      <div class="title_box">Sản Phẩm Nổi Bật</div>
      <div class="border_box">
        <div class="product_title"><a href="details.html">PYREDOL</a></div>
        <div class="product_img"><img style="width:100px;height:70px" src="client/images/pyredol.PNG" alt="" border="0" /></div>
        <div class="prod_price"><span class="price">Giá: 185000 VND</span></div>
      </div>
      <div class="">
        <div class="product_img"><img style="width:200px;height:300px" src="thu/images/thuoc.PNG" alt="" border="0" /></div>
      </div>
    </div>


