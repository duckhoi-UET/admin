@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Post
                            <small>List</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    @if(session('notify'))
                                <div class = 'alert alert-success'>
                                    {{session('notify')}}
                                </div>
                    @endif
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Address</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($post as $row)
                            <tr class="odd gradeX" align="center">
                                <td>{{$row->id}}</td>
                                <td><p>{{$row->name}}</p>
                                <img width = "100px" height = "100px" src = "image/{{explode('?',$row->image)[0]}}">
                                </td>
                                <td>{{$row->category->name}}
                                <td>{{$row->address}}</td>
                                <td>{{$row->description}}</td>
                                <td>{{$row->price}}</td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/post/delete/{{$row->id}}"> Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/post/edit/{{$row->id}}">Edit</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
@endsection