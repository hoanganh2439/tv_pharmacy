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
                                <th>Made</th>
                                <th>Images</th>
                                <th align="center">Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            <div ></div>
                            <!--loop to get all product  -->
                            @foreach($pro as $p)
                                <tr  class="odd gradeX" align="left">
                                    <td>{{$p->proname}}</td>
                                    <td>{{$p->price}}</td>
                                    <td>
                                        <?php $cate = DB::table('categories')->where('cateid',$p['cate_id'])->first(); ?>
                                        {!!$cate->catename!!}
                                    </td>
                                    <td>
                                        <?php $made = DB::table('mades')->where('madeid',$p['made_id'])->first(); ?>
                                        {!!$made->madename!!}
                                    </td>
                                    <td>
                                        <?php $imge = DB::table('images')->where('pro_id',$p['proid'])->first(); ?>
                                        <img width="50px" src="admin_asset/upload/images/san-pham/{{$imge->img_name}}"/>
                                    </td>
                                    <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/product/deleteproduct/{{$p->proid}}"> Delete</a></td>
                                    <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/product/editproduct/{{$p->proid}}">Edit</a></td>
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