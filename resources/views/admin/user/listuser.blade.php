 @extends('admin.layout.index')

 @section('content')

<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Danh Sách Người Dùng
                        </h1>
                    </div>
                    <form action="admin/category/search" method="POST">
                            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                            <div class="form-group">
                                <button type="submit" >Search</button>
                                <input  name="id" placeholder="Please Input" />
                            </div>
                            
                    </form>  
                    <table class="table table-striped table-bordered table-hover" >
                        <thead>
                            <tr align="center">
                            	<th>ID</th>
                                <th>User Name</th>
                                <th>Role</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- loop to get all category -->   
                            @foreach($user as $l)
                                <tr class="odd gradeX" align="center">
                                	 <td>{{$l -> id}}</td>
                                    <td>{{$l -> username}}</td>
                                    <td>{{$l -> level}}</td>
                                    <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/category/deleteCate/{{$l ->id}}"> Delete</a></td>
                                    <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/category/editCate/{{$l ->id}}">Edit</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                     @if(session('messages'))
                            <div class="alert alert-success">
                                {{session('messages')}}
                            </div>
                    @endif 
                </div>
                <!--  -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
@endsection
