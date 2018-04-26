@extends('viewall.layout.index')

@section('content')
	<div id="content">

         <!-- if add success. System will ouput message -->
        @if(session('messages'))
            <div class="alert alert-success">
                 <!-- output message -->
                {{session('messages')}}
            </div>
        @endif
			<form action="customer/account/editprofile/{{$cus->cusid}}" method="post" class="beta-form-checkout">
				<input type="hidden" name="_token" value="{{csrf_token()}}"/>
				<div class="row">
					
					<div class="col-sm-3"></div>
					<div class="col-sm-6">
						<h3 style="text-align: center;">Edit Profile: {{$cus->email}}</h3>
						<div class="space20">&nbsp;</div>
						<div class="form-group">
							<label>Email address*</label>
							<input class="form-control" type="email" value="{{$cus->email}}" name="email" readonly>
						</div>
						<div class="form-group">
							<label for="your_last_name">Fullname*</label>
							<input class="form-control" type="text" value="{{$cus->fullname}}" name="fullname" readonly>
						</div>
						<div class="form-group">
							<label for="email">Date OF Birth</label>
							<input class="form-control" type="text" value="{{$cus->dateofbirth}}" name="dateofbirth" readonly>
						</div>
						<div class="form-group">
							<label for="email">Gennder: </label>
							@if($cus->gender ==1)
								<input class="form-control" type="text" value="Male" name="dateofbirth" readonly>
							@else
								<input class="form-control" type="text" value="Female" readonly>
							@endif
						</div>

						<div class="form-group">
							<label for="adress">Address*</label>
							<input type="text" class="form-control" value="{{$cus->address}}" name="address" >
						</div>
						<div class="form-group">
							<label for="phone">Phone*</label>
							<input type="text" class="form-control" value="{{$cus->phonenumber}}" name="phone">
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
@endsection