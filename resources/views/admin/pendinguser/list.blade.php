@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Pending User
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
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Role</th>
                                <th>Address</th>
                                <th>Created At</th>
                                <th>Accept</th>
                                <th>Refuse</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($user as $row)
                            <tr class="odd gradeX" align="center">
                                <td>{{$row->id}}</td>
                                <td>{{$row->name}}</td>
                                <td>{{$row->email}}</td>
                                <td>{{$row->phone}}</td>
                                <td>{{$row->role->roleName}}</td>
                                <td>{{$row->address}}</td>
                                <td>{{$row->created_at}}</td>
                                <td class="center"><i class="fa fa-check-square  fa-fw"></i><a href="admin/pendinguser/accept/{{$row->id}}"> Accept</a></td>
                                <td class="center"><i class="fa fa-hand-o-left fa-fw"></i> <a href="admin/pendinguser/refuse/{{$row->id}}">Refuse</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Refused User
                            <small>List</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Role</th>
                                <th>Address</th>
                                <th>Created At</th>
                                <th>Recover</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($refuse as $row)
                            <tr class="odd gradeX" align="center">
                                <td>{{$row->id}}</td>
                                <td>{{$row->name}}</td>
                                <td>{{$row->email}}</td>
                                <td>{{$row->phone}}</td>
                                <td>{{$row->role->roleName}}</td>
                                <td>{{$row->address}}</td>
                                <td>{{$row->created_at}}</td>
                                <td class="center"><i class="fa fa-check-square  fa-fw"></i><a href="admin/pendinguser/recover/{{$row->id}}"> Recover</a></td>
                                <td class="center"><i class="fa fa-trash-o fa-fw"></i> <a href="admin/pendinguser/delete/{{$row->id}}">Delete</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.container-fluid -->
        </div>
@endsection