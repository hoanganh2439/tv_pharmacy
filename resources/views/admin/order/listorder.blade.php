 @extends('admin.layout.index')

 @section('content')

<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">List Product
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-12">
                        <div class="col-lg-6" style="text-align: left;">
                            <form action="admin/product/search" method="POST">
                                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                                <div class="form-group">
                                    <button type="submit" >Search</button>
                                    <input  name="id" placeholder="Please Input" />
                                </div>
                            </form>
                        </div>
                        <div class="col-lg-6" style="text-align: right;">
                           
                                <form action="admin/order/report" method="POST">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                                    <div class="form-group">
                                        
                                        <button type="submit" > Product sold a day</button>
                                        <input type="date" name="date" style="height: 27px;"/>
                                    </div>
                                </form>
                        </div>
                    </div>
                              
                    <table class="table table-striped table-bordered table-hover"  >
                        <thead>
                            <tr >
                                <th>Order ID</th>
                                <th>Customer Name</th>
                                <th>Total Price</th>
                                <th>Status</th>
                               
                            </tr>
                        </thead>
                        <tbody>
                            <div ></div>
                            <!--loop to get all product  -->
                            @foreach($listOrder as $l)
                                <tr  class="odd gradeX" align="left">
                                    <td><a href="admin/order/consider/{{$l->orderid}}">{{$l->orderid}}</a></td>
                                    <td>
                                        <?php $cus = DB::table('Customers')->where('cusid',$l->cus_id)->first();?>
                                        <a href="admin/order/consider/{{$l->orderid}}">{{$cus->fullname}}</a>
                                    </td>
                                    <td><a href="admin/order/consider/{{$l->orderid}}">{{$l->totalprice}}</a></td>
                                
                                      <?php $order = DB::table('orders')->where('orderid',$l->orderid)->first() ?>
                                        @if($order->status ==1)
                                            <td style="color:green;"><a href="admin/order/consider/{{$l->orderid}}">Finished</a></td>
                                        @else
                                            <td style="color:red;">Pending</td>
                                        @endif
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
                <div>{{ $listOrder->links() }}</div> 
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>


        <!-- /#page-wrapper -->
@endsection
    <script>
    $(function(){
           $('.datepicker').datepicker({
              format: 'mm-dd-yyyy'
            });
        });
    });
    </script>
   
