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
                    <form action="admin/product/search" method="POST">
                            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                            <div class="form-group">
                                <button type="submit" >Search</button>
                                <input  name="id" placeholder="Please Input" />
                            </div>
                    </form>   
                    <table class="table table-striped table-bordered table-hover"  >
                        <thead>
                            <tr >
                                <th>Product Name</th>
                                <th>Quantity</th>
                                <th>Images</th>
                                <th>Total Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <div ></div>
                            <!--loop to get all product  -->
                            @foreach($bestsell as $l)
                                <tr  class="odd gradeX" align="left">
                                    <td>{{$l->proname}}</td>
                                    <td>{{$l->sum}}</td>
                                    
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
                   
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
@endsection