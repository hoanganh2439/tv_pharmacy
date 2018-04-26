<?php $__env->startSection('content'); ?>
	<div id="content">

         <!-- if add success. System will ouput message -->
        
			<form action="customer/account/changepass/<?php echo e($cus->email); ?>" method="post" class="beta-form-checkout">
				<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>"/>
				<div class="row">
					
					<div class="col-sm-3"></div>
					<div class="col-sm-6">
						<h3 style="text-align: center;">Change Password : <?php echo e($cus->email); ?></h3>
						<div class="space20">&nbsp;</div>
						<div class="form-group">
							<label>Old Password*</label>
							<input class="form-control" type="password" value="" name="oldpass">
						</div>
						<div class="form-group">
							<label for="your_last_name">New Password*</label>
							<input class="form-control" type="text" value="" name="newpass" >
						</div>
						<div class="form-group">
							<label for="email">Confirm Password</label>
							<input class="form-control" type="text" value="" name="confpass" >
						</div>
						<div style="text-align: center;">
							<button type="submit" class="btn btn-primary">Next</button>
							<a href="customer/account/login" class="btn btn-danger">Not Change Password</a>
						</div>

						<div class="form-group">
							<?php if(session('messages')): ?>
					            <div class="alert alert-danger">
					                 <!-- output message -->
					                <?php echo e(session('messages')); ?>

					            </div>
					        <?php endif; ?>
						</div>
						<div class="form-group">
							<?php if(session('message')): ?>
					            <div class="alert alert-success">
					                 <!-- output message -->
					                <?php echo e(session('message')); ?>

					            </div>
					        <?php endif; ?>
						</div>
					</div>
					<div class="col-sm-3"></div>
					
				</div>
			</form>
			
		</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('viewall.layout.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>