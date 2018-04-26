@extends('viewall.layout.index')

@section('content')
	<div id="content">
         <!-- if add success. System will ouput message -->
        @if(session('messages'))
            <div class="alert alert-danger">
                 <!-- output message -->
                {{session('messages')}}
            </div>
        @endif
			<form action="customer/account/register" method="post" >
				<input type="hidden" name="_token" value="{{csrf_token()}}"/>
				<div class="row">
					<div class="col-sm-3"></div>
					<div class="col-sm-6">
						<h4>Register</h4>
						<div class="space20">&nbsp;</div>
						<div class="form-block">
							<label for="email">Email address*</label>
							<input type="email" name="email" required>
						</div>
						<div class="form-block">
							<label for="your_last_name">Fullname*</label>
							<input type="text" name="fullname" required>
						</div>
						<div class="form-block">
							<label for="email">Date OF Birth</label>
							<input type="text" name="dateofbirth" >
						</div>
						<div class="form-block">
								<label>Giới tính </label>
								<input id="gender" type="radio" class="input-radio" name="gender" value="1" checked="checked" style="width: 10%"><span style="margin-right: 10%">Male</span>
								<input id="gender" type="radio" class="input-radio" name="gender" value="0" style="width: 10%"><span>Female</span>
											
							</div>
						<div class="form-block">
							<label for="adress">Address*</label>
							<input type="text" name="address"  required>
						</div>
						<div class="form-block">
							<label for="phone">Phone*</label>
							<input type="text" name="phone" required>
						</div>
						<div class="form-block">
							<label for="phone">Password*</label>
							<input type="password" name="pass"required >
						</div>
						<div class="form-block">
							<label for="phone">Confirm password*</label>
							<input type="password" name="conpass" 	required>
						</div>
						<div style="text-align: center;">
							<button type="submit" class="btn btn-primary">Register</button>
							<button type="submit" class="btn btn-error">Back</button>
						</div>
					</div>
					<div class="col-sm-3"></div>
				</div>
			</form>
		</div>
@endsection