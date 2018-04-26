 @extends('admin.layout.index')

 @section('content')

<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                   
                    <div class="col-lg-12">
                        <h2 class="page-header" >List Product Sold A Day: <span style="color:green">{{$date}}</span></h2>
                        
                    </div>
                    <!-- /.col-lg-12 -->
                    
                    <table class="table table-striped table-bordered table-hover"  >
                        <thead>
                            <tr>
                                <th>Product Name</th>
                                <th>Quantity</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <div ></div>
                            <!--loop to get all product  -->
                            @foreach($order_array as $aray)
                                <tr  class="odd gradeX" align="left">
                                    <td>{{$aray->proname }}</td>
                                    <td>{{$aray->quantity }}</td>
                                    <td>{{$aray->totalprice*$aray->quantity}}.$</td>
                                </tr>
                            @endforeach
                           
                        </tbody>
                        
                        <!-- if delete success ouput messages  -->
                         @if(session('messages'))
                            <div class="alert alert-success">
                                {{session('messages')}}
                            </div>
                        @endif 
                    </table>
                    <div><h3 class="page-header">Total Price:    {{$ordertotal[0]->totalprice}}.$</h3></div>
                    <div class="text-left">
                        <button type="submit" class="btn btn-default">
                            <a href="admin/order/pdf/{{$date}}">Download PDF</a>
                        </button>
                            
                    </div>  
                
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
@endsection
   
   
