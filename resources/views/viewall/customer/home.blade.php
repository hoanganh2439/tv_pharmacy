@extends('viewall.layout.index')

@section('content')
<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="beta-products-list">
							<h2>New Products</h2>
							<div class="beta-products-details">
								<div class="clearfix"></div>
							</div>
							
								<div class="row">
									@foreach($pro1 as $pr)
									<div class="col-sm-3">
										<div class="single-item">
											<div class="single-item-header">
												<a href="customer/showall/detailproduct/{{$pr->proid}}">
									              <?php $imge = DB::table('images')->where('pro_id',$pr['proid'])->first(); ?>
									              <img style="width:150px;height:200px" src="admin_asset/upload/images/san-pham/{{$imge->img_name}}"/>
									            </a>
											</div>
											<div class="single-item-body">
												<p class="single-item-title"><a href="customer/showall/detailproduct/{{$pr->proid}}">{{$pr -> proname}}</a></p>
												<p class="single-item-price">
													<span>{{$pr->price}} $</span>
												</p>
											</div>
											<div class="single-item-caption">
												<a class="add-to-cart pull-left" href="customer/showall/muaghang/{{$pr->proid}}"><i class="fa fa-shopping-cart"></i></a>
												<a class="beta-btn primary" href="customer/showall/detailproduct/{{$pr->proid}}">Details <i class="fa fa-chevron-right"></i></a>
												<div class="clearfix"></div>
											</div>
										</div>
									</div>
									@endforeach
								</div> <!-- .beta-products-list -->
							 
						<div class="space50">&nbsp;</div>

						<div class="beta-products-list">
							<h2>Show All Products</h2>
							<div class="beta-products-details">
								<div class="clearfix"></div>
							</div>
							<div class="row">
								 @foreach($pro as $pr)
								<div class="col-sm-3">
									<div class="single-item">
										<div class="single-item-header">
											<a href="customer/showall/detailproduct/{{$pr->proid}}" >
								                <?php $imge = DB::table('images')->where('pro_id',$pr['proid'])->first(); ?>
								                <img style="width:150px;height:150px" src="admin_asset/upload/images/san-pham/{{$imge->img_name}}"/>
								              </a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$pr -> proname}}</p>
											<p class="single-item-price">
												<span>{{$pr->price}} $</span>
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="customer/showall/muaghang/{{$pr->proid}}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="customer/showall/detailproduct/{{$pr->proid}}">Details <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								 @endforeach
							</div>
							<div class="space40">&nbsp;</div>
							{!!$pro ->links()!!}
							<!-- .beta-products-list -->
					</div>
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
		</div> <!-- #content -->
	</div>
</div>
</div>
@endsection