 @extends('admin.layout.index')

 @section('content')
 <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Add Payment Cart
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
                        <form action="admin/payment/addpayment" method="POST">
                            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                            <div class="form-group">
                                <label>Code_pay</label>
                                <input class="form-control" name="codepay" />
                            </div>
                            <div class="form-group">
                                <label>Fullname</label>
                                <input class="form-control" name="fullname"/>
                            </div>
                            <div class="form-group">
                                <label>Limit Date</label>
                                <input class="form-control" type="date" name="limitdate" />
                            </div>
                            <div class="form-group">
                                <label>CVC</label>
                                <input class="form-control" name="cvc" />
                            </div>
                            <div class="form-group">
                                <label>Total Money</label>
                                <input class="form-control" name="total"/>
                            </div>
                            <button type="submit" class="btn btn-default">Add Cart</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        </form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
@endsection