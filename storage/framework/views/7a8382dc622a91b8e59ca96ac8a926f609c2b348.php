<?php $__env->startSection('content'); ?>
<div class="container">
	<p style="color:#008000;font-size: 20px;font-weight: bold;">Note: You can only buy 100 items a day</p>
	<div style="width:1150px;height:700px;overflow:auto;">
		<form action="customer/showall/giohang" method="post" class="beta-form-checkout">
			<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>"/>
			<div id="content">

				<div class="table-responsive">
					<?php if(session('messages')): ?>
					<div class="alert alert-danger">
						<!-- output message -->
						<?php echo e(session('messages')); ?>

					</div>
					<?php endif; ?>	
					<?php if(session('message')): ?>
					<div class="alert alert-successs">
						<!-- output message -->
						<?php echo e(session('message')); ?>

					</div>
					<?php endif; ?>
					<table class="shop_table beta-shopping-cart-table" cellspacing="0">
						<thead>
							<tr>
								<th class="product-name">Product</th>
								<th class="product-price">Price</th>
								<th class="product-quantity">Qty.</th>

								<th class="product-subtotal">Total</th>
								<th class="product-remove">Action</th>
							</tr>
						</thead>
						<tbody>	
							<?php $__currentLoopData = $content; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $content): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<tr class="cart_item">
								<td class="product-name">
									<div class="media">
										<div class="media-body">
											<p class="font-large table-title" ><?php echo e($content -> name); ?></p>

										</div>
										<img class="pull-left" style="width:100px;height:100px" src="admin_asset/upload/images/san-pham/<?php echo e($content->options->img); ?>" alt="">

									</div>
								</td>

								<td class="product-price">
									<span class="amount" style="font-size: 15px;"><?php echo e($content -> price); ?>.$</span>
								</td>

								<td class="product-quantity">
									<input class="qty" type="text" style="width: 70px;" value="<?php echo e($content -> qty); ?>" name="quan"/>
								</td>
								<td class="product-subtotal">
									<span class="amount" style="font-size: 15px;"><?php echo e($content -> subtotal); ?>.$</span>
								</td>

								<td class="product-remove">
									<a class="btn btn-success edit " id="<?php echo e($content -> rowId); ?>" href="javascript:void(0)" class="btn btn-success"  >Update</a>	
									<a href="customer/showall/deleteshop/<?php echo e($content -> rowId); ?>" class="btn btn-danger">Delete</a>
								</td>
							</tr>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

						</tbody>

					</table>
					<div class="text-center"><a href="customer/showall/product" class="btn btn-default">Go to shopping <span class="glyphicon glyphicon-hand-right"></span></a></div>
					<div class="space20">&nbsp;</div>
					<div class="text-center"><button type="submit" class="btn btn-success">Next</button></div>
					<div class="clearfix"></div>
				</div>
			</div>
		</form>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('viewall.layout.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>