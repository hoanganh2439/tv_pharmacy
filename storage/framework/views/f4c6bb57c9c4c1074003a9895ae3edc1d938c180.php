<?php $__env->startSection('content'); ?>
<div class="container">
		<div id="content">
			<div class="row">
				<div class="col-sm-9">

					<div class="row">
						<div class="col-sm-4">
							<?php $imge = DB::table('images')->where('pro_id',$product['proid'])->first(); ?>
              			<img width="180" height="207" src="admin_asset/upload/images/san-pham/<?php echo e($imge->img_name); ?>"/>
						</div>
						<div class="col-sm-8">
							<div class="single-item-body">
								<p class="single-item-title"><?php echo e($product ->proname); ?></p>
								<p class="single-item-price">
									<span class="flash-sale"><?php echo e($product ->price); ?> .$</span>
									<div class="clearfix"></div>
							
									<span><?php echo e($product ->category->catename); ?></span><br/>
									<span><?php echo e($product ->made->madename); ?></span><br/>
								</p>
							</div>

							<div class="clearfix"></div>
							<div class="space20">&nbsp;</div>

							<div class="single-item-desc">
								
							</div>
							<div class="space20">&nbsp;</div>
						</div>
					</div>

					<div class="space40">&nbsp;</div>
					<div class="woocommerce-tabs">
						<ul class="tabs">
							<li><a href="#tab-description">Description</a></li>
							<li><a href="#tab-reviews">Reviews (0)</a></li>
						</ul>

						<div class="panel" id="tab-description">
							
							<p><?php echo e($product ->description); ?></p>
						</div>
						<div class="panel" id="tab-reviews">
							<p>No Reviews</p>
						</div>
					</div>
					<div class="space50">&nbsp;</div>


					<!-- San pham tuong tu -->
					<div class="beta-products-list">
						<h4>Related Products</h4>

						<div class="row">
							 <?php $__currentLoopData = $pro; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<div class="col-sm-4">
								<div class="single-item">
									<div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>

									<div class="single-item-header">
										<a href="customer/showall/detailproduct/<?php echo e($pro->proid); ?>">
						                    <?php $imge = DB::table('images')->where('pro_id',$pro['proid'])->first(); ?>
						                    <img width="180" height="207" src="admin_asset/upload/images/san-pham/<?php echo e($imge->img_name); ?>"/>
						                  </a>
									</div>
									<div class="single-item-body">
										<p class="single-item-title"><?php echo e($pro -> proname); ?></p>
										<p class="single-item-price">
											<span class="flash-sale"><?php echo e($pro -> price); ?> .VND</span>
										</p>
									</div>
									<div class="single-item-caption">
										<a class="add-to-cart pull-left" href="customer/showall/muaghang/<?php echo e($pro->proid); ?>"><i class="fa fa-shopping-cart"></i></a>
										<a class="beta-btn primary" href="customer/showall/detailproduct/<?php echo e($pro->proid); ?>">Details <i class="fa fa-chevron-right"></i></a>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
							 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</div>
					</div> <!-- .beta-products-list -->
				</div>


				<!-- San pham ban chay -->
				<div class="col-sm-3 aside">
					
					<div class="widget">
						<h3 class="widget-title">New Products</h3>
						<div class="widget-body">
							<?php $__currentLoopData = $pronew; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<div class="beta-sales beta-lists">
								<div class="media beta-sales-item">
									<a class="pull-left" href="product.html">
										<?php $imge = DB::table('images')->where('pro_id',$pr['proid'])->first(); ?>
									    <img  src="admin_asset/upload/images/san-pham/<?php echo e($imge->img_name); ?>"/>
									</a>
									<div class="media-body">
										<?php echo e($pr -> proname); ?>

										<span class="beta-sales-price">$34.55</span>
									</div>
								</div>
							</div>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</div>
					</div> <!-- best sellers widget -->
				</div>


			</div>
		</div> <!-- #content -->
	</div>
	<?php $__env->stopSection(); ?>
<?php echo $__env->make('viewall.layout.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>