<?php $__env->startSection('content'); ?>
	<div id="content">

         <!-- if add success. System will ouput message -->
        <?php if(session('messages')): ?>
            <div class="alert alert-success">
                 <!-- output message -->
                <?php echo e(session('messages')); ?>

            </div>
        <?php endif; ?>
			<form action="customer/account/editprofile/<?php echo e($cus->cusid); ?>" method="post" class="beta-form-checkout">
				<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>"/>
				<div class="row">
					
					<div class="col-sm-3"></div>
					<div class="col-sm-6">
						<h3 style="text-align: center;">Edit Profile: <?php echo e($cus->email); ?></h3>
						<div class="space20">&nbsp;</div>
						<div class="form-group">
							<label>Email address*</label>
							<input class="form-control" type="email" value="<?php echo e($cus->email); ?>" name="email" readonly>
						</div>
						<div class="form-group">
							<label for="your_last_name">Fullname*</label>
							<input class="form-control" type="text" value="<?php echo e($cus->fullname); ?>" name="fullname" readonly>
						</div>
						<div class="form-group">
							<label for="email">Date OF Birth</label>
							<input class="form-control" type="text" value="<?php echo e($cus->dateofbirth); ?>" name="dateofbirth" readonly>
						</div>
						<div class="form-group">
							<label for="email">Gennder: </label>
							<?php if($cus->gender ==1): ?>
								<input class="form-control" type="text" value="Male" name="dateofbirth" readonly>
							<?php else: ?>
								<input class="form-control" type="text" value="Female" readonly>
							<?php endif; ?>
						</div>

						<div class="form-group">
							<label for="adress">Address*</label>
							<input type="text" class="form-control" value="<?php echo e($cus->address); ?>" name="address" >
						</div>
						<div class="form-group">
							<label for="phone">Phone*</label>
							<input type="text" class="form-control" value="<?php echo e($cus->phonenumber); ?>" name="phone">
						</div>
						<div style="text-align: center;">
							<button type="submit" class="btn btn-primary">Next</button>
							<a href="customer/account/login" class="btn btn-danger">Not Change Profile</a>
						</div>
					</div>
					<div class="col-sm-3"></div>
					
				</div>
			</form>
		</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('viewall.layout.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>