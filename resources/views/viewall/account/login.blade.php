@extends('viewall.layout.index')
@section('content')
<div id="content">		
		@if(session('messages'))
            <div class="alert alert-success">
                 <!-- output message -->
                {{session('messages')}}
            </div>
        @endif	
	<form action="customer/account/login" method="post" class="beta-form-checkout">
		<input type="hidden" name="_token" value="{{csrf_token()}}"/>
		<div class="row">
			<div class="col-sm-3"></div>
			<div class="col-sm-6">
				<h4>Login Form</h4>
				<div class="space20">&nbsp;</div>
				<div class="form-group">
	                <label>Email address</label>
	                <input class="form-control" type="email" name="email" placeholder="Please enter email" required/>
	            </div>
	            <div class="form-group">
	                <label>Password</label>
	                <input class="form-control" type="password" name="pass" placeholder="Please enter password" required/>
	            </div>

				
					<button type="submit" class="btn btn-primary">Login</button>
					<button type="submit" class="btn btn-primary">Cancel</button>
				
			</div>
			<div class="col-sm-3"></div>
		</div>
	</form>
</div> 
@endsection