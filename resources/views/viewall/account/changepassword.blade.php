@extends('viewall.layout.index')

@section('content')
	<div id="content">

         <!-- if add success. System will ouput message -->
        
			<form action="customer/account/changepass/{{$cus->email}}" method="post" class="beta-form-checkout">
				<input type="hidden" name="_token" value="{{csrf_token()}}"/>
				<div class="row">
					
					<div class="col-sm-3"></div>
					<div class="col-sm-6">
						<h3 style="text-align: center;">Change Password : {{$cus->email}}</h3>
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
							@if(session('messages'))
					            <div class="alert alert-danger">
					                 <!-- output message -->
					                {{session('messages')}}
					            </div>
					        @endif
						</div>
						<div class="form-group">
							@if(session('message'))
					            <div class="alert alert-success">
					                 <!-- output message -->
					                {{session('message')}}
					            </div>
					        @endif
						</div>
					</div>
					<div class="col-sm-3"></div>
					
				</div>
			</form>
			
		</div>
@endsection