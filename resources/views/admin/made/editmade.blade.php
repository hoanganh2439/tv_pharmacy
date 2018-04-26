 @extends('admin.layout.index')

 @section('content')

<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Edit Made
                             <!-- show name of Catogory need edit -->
                            <small>{{$made -> name}}</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="admin/made/editmade/{{$made->made_id}}" method="POST">
                        <!-- output error if have error >0 -->
                        @if(count($errors) > 0)
                        <div class="alert alert-danger">
                             @foreach($errors->all() as $err)
                              <!-- ouput error -->
                                {{$err}}<br>
                             @endforeach   
                        </div>
                        @endif
                         <!-- ouput message if edit success -->
                        @if(session('messages'))
                            <div class="alert alert-success">
                                {{session('messages')}}
                            </div>
                        @endif
                            <input type="hidden" name="_token" value="{{csrf_token()}}"/>    
                            <div class="form-group">
                                <label>Tên Hãng Sản Xuất</label>
                                <input class="form-control" name="Name" value="{{$made->name}}" placeholder="Please Enter Category Name" />
                            </div>
                            <button type="submit" class="btn btn-default">Sửa</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
@endsection