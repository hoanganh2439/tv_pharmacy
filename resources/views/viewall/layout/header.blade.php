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
						@if(session()->has('cus'))
							<li><a href="customer/account/editprofile/{{Session::get('email')}}">{{Session::get('email')}}</a></li>
							<li><a href="customer/account/changepass/{{Session::get('email')}}">Change Password ?</a></li>
							<li><a href="customer/account/logout">Logout</a></li>
						@elseif(session()->has('email'))
							<li><a href="customer/account/editprofile/">{{Session::get('email')}}</a></li>
							<li><a href="customer/account/changepass">Change Password</a></li>
							<li><a href="customer/account/logout">Logout</a></li>
						@else
							<li><a href="customer/account/register">Register</a></li>
							<li><a href="customer/account/login">Login</a></li>
							
							<li><a href="googlelogin">Login with Google</a></li>

						@endif
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
							<input type="hidden" name="_token" value="{{csrf_token()}}"/>
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
								@foreach($cate as $cate)
								<li><a href="customer/showall/typepcate/{{$cate ->cateid}}">{{$cate -> catename}}</a></li>
								@endforeach
							</ul>
						</li>
						<li>
							<a href="customer/showall/show/jhgy">Made</a>
							<ul class="sub-menu">
								@foreach($made as $made)
								<li><a href="customer/showall/typemade/{{$made ->madeid}}">{{$made -> madename}}</a></li>
        						@endforeach
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