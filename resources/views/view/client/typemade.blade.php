@extends('view.layout.index')

@section('content')

	    <div class="center_content">
     	<div class="center_title_bar">Danh Sản Phẩm Theo Hãng</div>
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
			        </div>
			        <div class="prod_details_tab"> 
			        	<a href="customer/showall/detailproduct/{{$lc->proid}}" class="prod_details">Details</a> 		
			        </div>				     
			    </div>
			     @endforeach 
			
    	</div>
@endsection