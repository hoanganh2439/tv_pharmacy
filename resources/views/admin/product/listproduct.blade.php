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
                                <th>Price</th>
                                <th>Category Name</th>
                                <th>Images</th>
                                <th>Status</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            <div ></div>
                            <!--loop to get all product  -->
                            @foreach($list as $l)
                                <tr  class="odd gradeX" align="left">
                                    <td>{{$l->proname}}</td>
                                    <td>{{$l->price}}</td>
                                    <td>
                                        <?php $cate = DB::table('categories')->where('cateid',$l['cate_id'])->first(); ?>
                                        {!!$cate->catename!!}
                                    </td>
                                    <td>
                                        <?php $imge = DB::table('images')->where('pro_id',$l['proid'])->first(); ?>
                                        <img width="50px" src="admin_asset/upload/images/san-pham/{{$imge->img_name}}"/>
                                    </td>
                                    <td>
                                        @if($l->status == 1)
                                            On
                                        @elseif($l->status ==0)
                                            Off
                                        @endif
                                       
                                    </td>
                                    <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/product/deleteproduct/{{$l->proid}}"> Delete</a></td>
                                    <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/product/editproduct/{{$l->proid}}">Edit</a></td>
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
                    {!!$list -> links()!!}
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
@endsection