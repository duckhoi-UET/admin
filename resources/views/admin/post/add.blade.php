@extends('admin.layout.index')
@section('content')
<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Category
                            <small>Add</small>
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
                        <form action="admin/post/add" method="POST" enctype = "multipart/form-data">
                        <input type="hidden" name = "_token" value = "{{csrf_token()}}"/>
                            <div class="form-group">
                                <label>Category</label>
                                <select class="form-control" name = "category">
                                    @foreach($cat as $row)
                                    <option value="{{$row->id}}">{{$row->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Province</label>
                                <select class="form-control" name = "province">
                                    @foreach($province as $row)
                                    <option value="{{$row->id}}">{{$row->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Name</label>
                                <input class="form-control" name="name" placeholder="Please Enter address" />
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <input class="form-control" name="address" placeholder="Please Enter address" />
                            </div>
                            <div class="form-group">
                                <label>Image</label>
                                <input class="form-control" name="image[]" type = "file" multiple />
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea id='demo' class="form-control ckeditor" rows="3" name = "description"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Price</label>
                                <input class="form-control" name="price" placeholder="Please Enter price" />
                            </div>
                            <div class="form-group">
                                <label>Area</label>
                                <input class="form-control" name="area" placeholder="Please Enter Area" />
                            </div>
                            <div class="form-group">
                                <label>Facility</label>
                                <li><input type = "checkbox" name = "wash_machine" value = 1 >  M??y gi???t</li>
                                <li><input type = "checkbox" name = "wifi" value = 1 >  Wifi</li>
                                <li><input type = "checkbox" name = "tv"  value = 1>  Tivi</li>
                                <li><input type = "checkbox" name = "air_con" value = 1 >  ??i???u h??a</li>
                                <li><input type = "checkbox" name = "camera" value = 1 >  Camera</li>
                                <li><input type = "checkbox" name = "garden" value = 1>  S??n v?????n</li>
                                <li><input type = "checkbox" name = "heater" value = 1 >  B??nh n??ng l???nh</li>
                                <li><input type = "checkbox" name = "pool"  value = 1>  B??? b??i</li>
                            </div>
                            <div class="form-group">
                                <label>Around</label>
                                <li><input type = "checkbox" name = "market"  value = 1>  Si??u th???</li>
                                <li><input type = "checkbox" name = "hospital" value = 1>  B???nh vi???n</li>
                                <li><input type = "checkbox" name = "park"  value = 1>  C??ng vi??n</li>
                                <li><input type = "checkbox" name = "stadium"  value = 1>  S??n v???n ?????ng</li>
                                <li><input type = "checkbox" name = "school"  value = 1>  Tr?????ng h???c</li>
                                <li><input type = "checkbox" name = "bus"  value = 1>  Tr???m xe bus</li>
                            </div>
                            <button type="submit" class="btn btn-default">Post Add</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>

@endsection