 @extends('admin.layout.index')

 @section('content')

<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Delete Product
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <!--count error. if error >0  -->
                        @if(count($errors) > 0)
                            <div class="alert alert-danger">
                                <!-- System will get all error -->
                                 @foreach($errors->all() as $err)
                                 <!-- ouput error -->
                                    {{$err}}<br>
                                 @endforeach   
                            </div>
                        @endif
                        <!-- get message -->
                        @if(session('messages'))
                            <div class="alert alert-success">
                                <!-- output message -->
                                {{session('messages')}}
                            </div>
                        @endif
                        <!-- form use to edit Product  -->
                        <form action="admin/product/deleteproduct/{{$pro->proid}}" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                            <div class="form-group">
                                <label>Category Name</label>
                                <input class="form-control" name="proname" value="{{$pro->proname}}" placeholder="Please Enter name Product" />
                            </div>
                            <div class="form-group">
                                <label>Price</label>
                                <input class="form-control" name="price" value="{{$pro->price}}" placeholder="Please Enter price " />
                            </div>
                            <div class="form-group">
                                <label>Product Description</label>
                                
                                <textarea class="form-control"  name="description" rows="3">{{$pro->description}}</textarea>
                            </div>
                           <div class="form-group">
                                <label>Category Name</label>
                                <select class="form-control" name="category">
                                    <!-- loop use to display catid of product id -->
                                    @foreach($cate as $ca)
                                        <option 
                                            @if($pro->cate_id == $ca->cateid)
                                                 {{"selected"}}
                                            @endif
                                         value="{{$ca->cateid}}">{{$ca->catename}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Hãng Sản xuất</label>
                                <select class="form-control" name="made">
                                    <!-- loop to get all id of category -->
                                    @foreach($made as $made)
                                        <option 
                                            @if($pro->made_id == $made->madeid)
                                                 {{"selected"}}
                                            @endif
                                         value="{{$made->madeid}}">{{$made->madename}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Quanlity</label>
                                <input class="form-control" value="{{$pro->quanlity}}" name="quanlity" placeholder="Please Enter quanlity" />
                            </div>
                            <div class="form-group">
                                <label>Images</label>
                                <label>OLD IMAGES
                                	<?php $imge = DB::table('images')->where('pro_id',$pro['proid'])->first(); ?>
                                	<img width="50px" src="public/admin_asset/upload/images/san-pham/{{$imge->img_name}}"/>
                                </label>
                                <input type="file" id="images" name="images">
                            </div>
                            <div class="form-group">
                                <label>Admin Import</label>
                                <input class="form-control" readonly="true" name="idadmin" value="{{ Auth::user()->userid }}" />
                            </div>
                            <button type="submit" class="btn btn-default"> Delete</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
@endsection