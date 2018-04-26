@extends('viewall.layout.index')

@section('content')
<div class="container">
<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-3">
						<ul class="aside-menu">
							@foreach($listgen as $lc)	
							<li><a href="#">{{$lc -> proname}}</a></li>
							@endforeach 
						</ul>
					</div>
					<div class="col-sm-9">
						<div class="beta-products-list">
							<h4>List Product</h4>
							<div class="beta-products-details">
								<div class="clearfix"></div>
							</div>

							<div class="row">
								@foreach($listp as $lc)	
								<div class="col-sm-4">
									<div class="single-item">
										<div class="single-item-header">
											<a href="#">
								          		<?php $imge = DB::table('images')->where('pro_id',$lc->proid)->first(); ?>
					                            <img style="width:150px;height:150px" src="admin_asset/upload/images/san-pham/{{$imge->img_name}}"/>
								          	</a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$lc -> proname}}</p>
											<p class="single-item-price">
												<span>{{$lc -> price}}</span>
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="customer/showall/muaghang/{{$lc->proid}}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="product.html">Details <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								@endforeach 
							</div>
						</div> <!-- .beta-products-list -->
						<div class="space50">&nbsp;</div>
						{!!$listp->links()!!}
				</div> <!-- end section with sidebar and main content -->
			</div> <!-- .main-content -->
		</div> <!-- #content -->
</div>
@endsection