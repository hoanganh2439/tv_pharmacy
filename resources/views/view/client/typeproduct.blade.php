@extends('view.layout.index')

@section('content')

	    <div class="center_content">
     	<div class="center_title_bar">San Pham </div>
     			@foreach($listp as $lc)	
			      <div class="prod_box">
			        <div class="center_prod_box">
			          <div class="product_title"><a href="#">{{$lc -> proname}}</a></div>
			          <div class="product_img">
			          	<a href="#">
			          		<?php $imge = DB::table('images')->where('pro_id',$lc->proid)->first(); ?>
                            <img style="width:150px;height:90px" src="admin_asset/upload/images/san-pham/{{$imge->img_name}}"/>
			          	</a>
			      </div>
			          <div class="prod_price"><span class="price">{{$lc -> price}}</span></div>
			        </div>
			        <div class="prod_details_tab"> 
			        	<a href="khachhang/xem/chitiet/{{$lc ->proid}}" class="prod_details">Details</a> 						     </div>
			      </div>
			     @endforeach 
			<table width="583" height="26" border="0">
		        
      		</table>
    	</div>
@endsection