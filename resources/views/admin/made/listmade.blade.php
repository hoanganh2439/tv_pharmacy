 @extends('admin.layout.index')

 @section('content')

<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">List Made
                        </h1>
                    </div>
                    <!-- out message if delete success -->
                    @if(session('messages'))
                            <div class="alert alert-success">
                                {{session('messages')}}
                            </div>
                    @endif  
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
                                <th>Made Name</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- loop to get all category -->   
                            @foreach($list as $l)
                                <tr class="odd gradeX" align="center">
                                    <td>{{$l -> madeid}}</td>
                                    <td>{{$l -> madename}}</td>
                                    <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/made/editmade/{{$l ->madeid}}">Edit</a></td>
                                    <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/made/deletemade/{{$l ->madeid}}"> Delete</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                        {!!$list ->links()!!}
                    
                </div>
                <!--  -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
@endsection