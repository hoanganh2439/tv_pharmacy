 @extends('admin.layout.index')

 @section('content')
 <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Add New Product
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        @if(count($errors) > 0)
                         <!-- if count > 0 System find all error -->
                            <div class="alert alert-danger">
                                 @foreach($errors->all() as $err)
                                  <!-- output message -->
                                    {{$err}}<br>
                                 @endforeach   
                            </div>
                        @endif
                        <!-- out put message if add succes -->
                         @if(session('messages'))
                            <div class="alert alert-success">
                                <!-- output message  -->
                                {{session('messages')}}
                            </div>
                        @endif
                        <!-- form use to input information of product  -->
                        <form action="admin/product/addproduct" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                            <div class="form-group">
                                <label>Product Name</label>
                                <input class="form-control" name="proname" placeholder="Please Enter Product Name" />
                            </div>
                            <div class="form-group">
                                <label>Price</label>
                                <input class="form-control" name="price" placeholder="Please Enter Price" />
                            </div>
                            <!-- show all category to chose type for product  -->
                            <div class="form-group">
                                <label>Loại Sản Phẩm</label>
                                <select class="form-control" name="category">
                                    <!-- loop to get all id of category -->
                                    @foreach($category as $cat)
                                        <option value="{{$cat->cateid}}">{{$cat->catename}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Hãng Sản xuất</label>
                                <select class="form-control" name="made">
                                    <!-- loop to get all id of category -->
                                    @foreach($made as $made)
                                        <option value="{{$made->madeid}}">{{$made->madename}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Quanlity</label>
                                <input class="form-control" name="quanlity" placeholder="Please Enter quanlity" />
                            </div>
                            <div class="form-group">
                                <label>Images</label>
                                <input type="file" id="images" name="images" >
                            </div>
                            <div class="form-group">
                                <label>Product Description</label>
                                <textarea class="form-control" name="description" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Admin Import</label>
                                <input class="form-control" readonly="true" name="idadmin" value="{{ Auth::user()->userid }}" />
                            </div>
                            <button type="submit" class="btn btn-default">Add</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
@endsection