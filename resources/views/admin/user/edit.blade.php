@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">User
                            <small>{{$user->name}}</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        @if(count($errors) > 0)
                            <div class = "alert alert-danger">
                                @foreach($errors->all() as $err)
                                    {{$err}}<br>
                                @endforeach
                            </div>
                        @endif

                        @if(session('notify'))
                                <div class = 'alert alert-success'>
                                    {{session('notify')}}
                                </div>
                        @endif
                        <form action="admin/user/edit/{{$user->id}}" method="POST">
                        <input type="hidden" name = "_token" value = "{{csrf_token()}}"/>
                            <div class="form-group">
                                <label>Role</label>
                                <select class="form-control" name = "role">
                                    @foreach($role as $row)
                                    <option value="{{$row->id}}" 
                                    @if($row->id == $user->idRole)
                                    {{"selected"}}
                                    @endif>{{$row->roleName}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Name</label>
                                <input class="form-control" name="name" placeholder="Please Enter User Name" value = "{{$user->name}}" />
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type = "email" class="form-control" name="email" placeholder="Please Enter Email" value = "{{$user->email}}"] />
                            </div>
                            <div class="form-group">
                                <label>Phone</label>
                                <input class="form-control" name="phone" placeholder="Please Enter Phone Number" value = "{{$user->phone}}" />
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type = "password" class="form-control" name="password" value = "{{$user->password}}"/>
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <input class="form-control" name="address" placeholder="Please Enter Address" value = "{{$user->address}}" />
                            </div>
                            <button type="submit" class="btn btn-default">User Edit</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
@endsection