<div id="header">
		<div class="header-top">
			<div class="container">
				<div class="pull-left auto-width-left">
					<ul class="top-menu menu-beta l-inline">
						<li><a href=""><i class="fa fa-home"></i>27 Newyork, American </a></li>
						<li><a href=""><i class="fa fa-phone"></i>0965993887</a></li>
					</ul>
				</div>
				<div class="pull-right auto-width-right">
					<ul class="top-details menu-beta l-inline">
						<?php if(session()->has('cus')): ?>
							<li><a href="customer/account/editprofile/<?php echo e(Session::get('email')); ?>"><?php echo e(Session::get('email')); ?></a></li>
							<li><a href="customer/account/changepass/<?php echo e(Session::get('email')); ?>">Change Password ?</a></li>
							<li><a href="customer/account/logout">Logout</a></li>
						<?php elseif(session()->has('email')): ?>
							<li><a href="customer/account/editprofile/"><?php echo e(Session::get('email')); ?></a></li>
							<li><a href="customer/account/changepass">Change Password</a></li>
							<li><a href="customer/account/logout">Logout</a></li>
						<?php else: ?>
							<li><a href="customer/account/register">Register</a></li>
							<li><a href="customer/account/login">Login</a></li>
							
							<li><a href="googlelogin">Login with Google</a></li>

						<?php endif; ?>
					</ul>
				</div>
				<div class="clearfix"></div>
			</div> <!-- .container -->
		</div> <!-- .header-top -->
		<div class="header-body">
			<div class="container beta-relative">
				<div class="pull-left">
					<a href="index.html" id="logo"><img src="source/assets/dest/images/logo.JPG" style="width:450px;heigth:300px" alt=""></a>
				</div>
				<div class="pull-right beta-components space-left ov">
					<div class="space10">&nbsp;</div>
					<div class="beta-comp">
						<form  method="post" id="searchform" action="customer/showall/search">
							<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>"/>
					        <input type="text" value="" name="all" id="s" placeholder="Please input data.." />
					        <button class="fa fa-search" type="submit" id="searchsubmit"></button>
						</form>
					</div>
					<div class="beta-comp">
						<div class="cart">
							<a href="customer/showall/giohang"><i class="fa fa-shopping-cart"></i> Shopping cart</a></div>
						</div> 
					</div>
				</div>
				<div class="clearfix"></div>
			</div> <!-- .container -->
		</div> <!-- .header-body -->
		<div class="header-bottom" style="background-color: LimeGreen;">
			<div class="container">
				<a class="visible-xs beta-menu-toggle pull-right" href="#"><span class='beta-menu-toggle-text'>Menu</span> <i class="fa fa-bars"></i></a>
				<div class="visible-xs clearfix"></div>
				<nav class="main-menu">
					<ul class="l-inline ov">
						
						<li><a href="customer/showall/show">Home</a></li>
						<li>
							<a href="customer/showall/show">Category</a>
							<ul class="sub-menu">
								<?php $__currentLoopData = $cate; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<li><a href="customer/showall/typepcate/<?php echo e($cate ->cateid); ?>"><?php echo e($cate -> catename); ?></a></li>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</ul>
						</li>
						<li>
							<a href="customer/showall/show/jhgy">Made</a>
							<ul class="sub-menu">
								<?php $__currentLoopData = $made; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $made): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<li><a href="customer/showall/typemade/<?php echo e($made ->madeid); ?>"><?php echo e($made -> madename); ?></a></li>
        						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</ul>
						</li>
						<li><a href="customer/showall/aboutus">AboutUs</a></li>
						<li><a href="customer/showall/contact">Contact</a></li>

					</ul>
					<div class="clearfix"></div>
				</nav>
			</div> <!-- .container -->
		</div> <!-- .header-bottom -->
	</div>