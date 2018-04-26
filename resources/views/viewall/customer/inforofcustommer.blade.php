@extends('viewall.layout.index')

@section('content')
<div class="container">
	
	<div id="content">
		<form action="customer/showall/inforcus_cart" method="post" class="beta-form-checkout">
			<input type="hidden" name="_token" value="{{csrf_token()}}"/>	
			<div class="row">
				<div class="col-sm-6">
					<h4>Information Of Customer</h4>
					<div class="space20">&nbsp;</div>

					<div class="form-block">
						<label for="name">Full Name*</label>
						<input type="text" name="fullname" value="{{Session::get('fullname')}}" >
					</div>
					<div class="form-block">
						<label>Gender</label>
						<input id="gender" type="radio" class="input-radio" name="gender" value="nam" checked="checked" style="width: 10%"><span style="margin-right: 10%">Nam</span>
						<input id="gender" type="radio" class="input-radio" name="gender" value="nữ" style="width: 10%"><span>Nữ</span>

					</div>

					<div class="form-block">
						<label for="email">Email*</label>
						<input type="email" id="email" name="email" value="{{Session::get('email')}}" required placeholder="expample@gmail.com" readonly>
					</div>

					<div class="form-block">
						<label for="adress">Address*</label>
						<input type="text" id="adress" name="address" value="{{Session::get('address')}}" placeholder="Street Address" required>
					</div>


					<div class="form-block">
						<label for="phone">Phone Number*</label>
						<input type="text" id="phone" name="phone" value="{{Session::get('phone')}}" required>
					</div>

				</form>
			</div>
			<div class="col-sm-6">
				<div class="your-order">
					<div class="your-order-head"><h5>Total Price</h5></div>
					<div class="your-order-body" style="padding: 0px 10px">
						<div class="your-order-item">
							<div class="pull-right"><h5 class="color-black">{{ $subtotal}}</h5></div>
							<div class="clearfix"></div>
						</div>
					</div>
					<div class="your-order-head"><h5>Hình thức thanh toán</h5></div>

					<div class="your-order-body">
						<ul class="payment_methods methods">
							
							<input id="payment_method_cheque" type="radio" class="input-radio" name="payment_method" value="ATM" data-order_button_text="">
							<label for="payment_method_cheque">Chuyển khoản </label>
							<div class="payment_box payment_method_cheque" style="display: none;">
								<div class="row">
									<div class="col-sm-1"></div>
									<div class="col-sm-10">
										<h4  style="font-size:15px">Information Of Cart</h4>
										<div class="space20">&nbsp;</div>
										
										<input type="hidden" name="_token" value="{{csrf_token()}}"/>
										<div class="form-group">
											<label>Account Number</label>
											<input class="form-control" name="account" placeholder="Please enter account" />
										</div>
										<div class="form-group">
											<label>CVC</label>
											<input class="form-control" name="cvc" placeholder="Please enter cvc" />
										</div>
										<div class="form-group">
											<label>Total Price</label>
											<input class="form-control" name="totalprice" value="{{ $subtotal}}" placeholder="Please enter total price" />
										</div>
										<div class="form-group">
											@if(session('messages'))
											<div class="alert alert-success">
												<!-- output message -->
												{{session('messages')}}
											</div>
											@endif	
										</div>
									</div>
									<div class="col-sm-1"></div>
								</div>
							</div>
						</form>			
					</ul>
				</div>

				<div class="text-center">
					<button type="reset" class="btn btn-danger">Reset</button>
					<button type="submit" class="btn btn-success">Payment</button>
				</div>
			</div> <!-- .your-order -->
		</div>
	</div>
</div>
</form>
</div>
</div>
@endsection