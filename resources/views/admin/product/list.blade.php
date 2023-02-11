@extends('admin.layout')
@section("content_header")
    <div class="col-sm-6">
        <h1 class="m-0 text-dark">Products</h1>
    </div><!-- /.col -->
    <div class="col-sm-6 text-right">
        <a class="btn btn-outline-primary" href="{{url("admin/product/create")}}">Create a new product</a>
    </div>
@endsection
@section("main_content")
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Bordered Table</h3>
            <div class="card-tools">
                <form action="{{url("admin/product")}}" method="get">
                <div class="input-group input-group-sm float-left mr-3" style="width: 150px;">
                    <select class="form-control float-right" name="category_id">
                        <option value="0">Choose category...</option>
                        @foreach($categories as $item)
                            <option @if(app("request")->input("category_id")==$item->id) selected @endif value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="input-group input-group-sm float-left mr-3" style="width: 150px;">
                    <select class="form-control float-right" name="category_id">
                        <option value="0">Choose category...</option>
                        @foreach($categories as $item)
                            <option @if(app("request")->input("category_id")==$item->id) selected @endif value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="input-group input-group-sm float-left" style="width: 150px;">
                    <input value="{{app("request")->input("search")}}" type="text" name="search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                        <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                    </div>
                </div>
                </form>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>Name</th>
                    <th>Thumbnail</th>
                    <th>Price</th>
                    <th>Qty</th>
                    <th>Category Id</th>
                    <th style="width: 40px">Status</th>
                    <th style="width: 40px">Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->name}}</td>
                        <td><img width="75" src="{{$item->thumbnail}}" /></td>
                        <td>{{$item->price}}</td>
                        <td>{{$item->qty}}</td>
                        <td>{{$item->Category->name}}</td>
                        <td>
                            @if($item->status)
                            <span class="badge bg-success">Active</span>
                            @else
                            <span class="badge bg-warning">Inactive</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{url("admin/product/edit",["product"=>$item->id])}}" class="btn btn-outline-primary">Edit</a>
                            <form action="{{url("admin/product/delete",["product"=>$item->id])}}"
                                  method="post">
                                @csrf
                                <button type="submit" onclick="return confirm('Chắc chắn xóa?');" class="btn btn-outline-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
{{--            <ul class="pagination pagination-sm m-0 float-right">--}}
{{--                <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>--}}
{{--                <li class="page-item"><a class="page-link" href="#">1</a></li>--}}
{{--                <li class="page-item"><a class="page-link" href="#">2</a></li>--}}
{{--                <li class="page-item"><a class="page-link" href="#">3</a></li>--}}
{{--                <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>--}}
{{--            </ul>--}}
            {!! $data->appends(app("request")->input())->links("pagination::bootstrap-4") !!}
        </div>
    </div>
    <!-- /.card -->
@endsection
