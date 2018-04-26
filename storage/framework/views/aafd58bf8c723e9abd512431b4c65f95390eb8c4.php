<?php $__env->startSection('content'); ?>
<div class="container">
<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-3">
						<ul class="aside-menu">
							<?php $__currentLoopData = $listgen; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>	
							<li><a href="#"><?php echo e($lc -> proname); ?></a></li>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
						</ul>
					</div>
					<div class="col-sm-9">
						<div class="beta-products-list">
							<h4>List Product</h4>
							<div class="beta-products-details">
								<div class="clearfix"></div>
							</div>

							<div class="row">
								<?php $__currentLoopData = $listp; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>	
								<div class="col-sm-4">
									<div class="single-item">
										<div class="single-item-header">
											<a href="#">
								          		<?php $imge = DB::table('images')->where('pro_id',$lc->proid)->first(); ?>
					                            <img style="width:150px;height:150px" src="admin_asset/upload/images/san-pham/<?php echo e($imge->img_name); ?>"/>
								          	</a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title"><?php echo e($lc -> proname); ?></p>
											<p class="single-item-price">
												<span><?php echo e($lc -> price); ?></span>
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="customer/showall/muaghang/<?php echo e($lc->proid); ?>"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="product.html">Details <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
							</div>
						</div> <!-- .beta-products-list -->
						<div class="space50">&nbsp;</div>
						<?php echo $listp->links(); ?>

				</div> <!-- end section with sidebar and main content -->
			</div> <!-- .main-content -->
		</div> <!-- #content -->
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('viewall.layout.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>