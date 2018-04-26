<div class="right_content">
      
      <div class="title_box">Nhà Sản Xuất</div>
      <ul class="left_menu">
        @foreach($made as $made)
          <li class="odd"><a href="customer/showall/typemade/{{$made ->madeid}}">{{$made -> madename}}</a></li>
        @endforeach
      </ul>
      <div class="">
        <div class="product_img">
          <a href="customer/showall/medicalknowledge"><img style="width:197px;height:300px" src="thu/images/yhoc.PNG" alt="" border="0" />
          </a>
        </div>
      </div>
      <div class="">
        <div class="product_img"><a href="customer/showall/medicalknowledge"><img style="width:197px;height:300px" src="thu/images/stress.PNG" alt="" border="0" /></a></div>
      </div>
</div>