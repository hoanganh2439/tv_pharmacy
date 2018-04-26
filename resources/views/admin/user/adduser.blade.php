 @extends('admin.layout.index')

 @section('content')
 <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Add New User
                        </h1>
                    </div>
                    <!-- -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <!-- count error -->
                        @if(count($errors) > 0)
                         <!-- if count > 0 System find all error -->
                            <div class="alert alert-danger">
                                 @foreach($errors->all() as $err)
                                  <!-- output message -->
                                    {{$err}}<br>
                                 @endforeach   
                            </div>
                        @endif
                         <!-- if add success. System will ouput message -->
                        @if(session('messages'))
                            <div class="alert alert-success">
                                 <!-- output message -->
                                {{session('messages')}}
                            </div>
                        @endif
                        
                         <!-- Form use to input information of Category -->
                        <form action="admin/user/adduser" method="POST">
                            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                            <div class="form-group">
                                <label>User Name</label>
                                <input class="form-control" name="username" placeholder="Please Enter  Name" />
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input class="form-control" name="password" placeholder="Please Enter Password" />
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" name="email" placeholder="Please Enter Email" />
                            </div>
                            <div class="form-group">
                                <label>Date Of Birth</label>
                                <input class="form-control" name="dateofbirth" placeholder="Please Enter Date Of Brith" />
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <input class="form-control" name="address" placeholder="Please Enter Address" />
                            </div>
                            <div class="form-group">
                                <label>User Role</label>
                                <label class="radio-inline">
                                    <input name="level" value="Admin" checked="True" type="radio">Admin
                                </label>
                                <label class="radio-inline">
                                    <input name="level" value="Member" type="radio">Member
                                </label>
                            </div>
                            <button type="submit" class="btn btn-default">Add User</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        </form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
@endsection