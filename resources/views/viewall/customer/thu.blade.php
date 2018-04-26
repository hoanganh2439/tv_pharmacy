@extends('viewall.layout.index')

@section('content')
<div class="container">
	
	<div id="content">
		<form action="customer/showall/inforcus_cart" method="post" class="beta-form-checkout">
			<input type="hidden" name="_token" value="{{csrf_token()}}"/>	
			<div class="row">
				<div class="col-sm-6">
					<h4>Đặt hàng</h4>
					<div class="space20">&nbsp;</div>
					
					<div class="form-block">
						<label for="name">Họ tên*</label>
						<input type="text" name="fullname" value="{{Session::get('fullname')}}" >
					</div>
					<div class="form-block">
						<label>Giới tính </label>
						<input id="gender" type="radio" class="input-radio" name="gender" value="nam" checked="checked" style="width: 10%"><span style="margin-right: 10%">Nam</span>
						<input id="gender" type="radio" class="input-radio" name="gender" value="nữ" style="width: 10%"><span>Nữ</span>
						
					</div>

					<div class="form-block">
						<label for="email">Email*</label>
						<input type="email" id="email" name="email" value="{{Session::get('email')}}" required placeholder="expample@gmail.com" readonly>
					</div>

					<div class="form-block">
						<label for="adress">Địa chỉ*</label>
						<input type="text" id="adress" name="address" value="{{Session::get('address')}}" placeholder="Street Address" required>
					</div>
					

					<div class="form-block">
						<label for="phone">Điện thoại*</label>
						<input type="text" id="phone" name="phone" value="{{Session::get('phone')}}" required>
					</div>
					
					<div class="form-block">
						<label for="notes">Ghi chú</label>
						<textarea id="notes"></textarea>
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
							<li class="payment_method_bacs">
								<input id="payment_method_bacs" type="radio" class="input-radio" name="payment_method" value="COD" checked="checked" data-order_button_text="">
								<label for="payment_method_bacs">Thanh toán khi nhận hàng </label>
								<div class="payment_box payment_method_bacs" style="display: block;">
									Cửa hàng sẽ gửi hàng đến địa chỉ của bạn, bạn xem hàng rồi thanh toán tiền cho nhân viên giao hàng
								</div>						
							</li>

							<li class="payment_method_cheque">
								<input id="payment_method_cheque" type="radio" class="input-radio" name="payment_method" value="ATM" data-order_button_text="">
								<label for="payment_method_cheque">Chuyển khoản </label>
								<div class="payment_box payment_method_cheque" style="display: none;">
									Chuyển tiền đến tài khoản sau:
									<br>- Số tài khoản: 123 456 789
									<br>- Chủ TK: Nguyễn A
									<br>- Ngân hàng ACB, Chi nhánh TPHCM
								</div>						
							</li>
							
						</ul>
					</div>

					<div class="text-center"><button type="submit" class="btn btn-success">Check Out</button></div>
				</div> <!-- .your-order -->
			</div>
		</div>
	</div>
</form>
</div>
</div>
@endsection