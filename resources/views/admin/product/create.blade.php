@extends('admin.layout')
@section("custom_css")
    <link rel="stylesheet" href="/admin/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="/admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
@endsection
@section("custom_js")
    <script src="/admin/plugins/select2/js/select2.full.min.js"></script>
    <script type="text/javascript">
        $('.select2').select2();
    </script>
@endsection
@section("content_header")
    <div class="col-sm-6">
        <h1 class="m-0 text-dark">Create a new product</h1>
    </div><!-- /.col -->
@endsection
@section("main_content")
    <div class="row">
        <!-- left column -->
        <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Product information</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="post" action="{{url("/admin/product/create")}}" role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        @include("admin.html.form.input",[
                            "label"=>"Product Name",
                            "key"=>"name",
                            "type"=>"text",
                            "required"=>true
                        ])
                        @include("admin.html.form.input",[
                            "label"=>"Product Price",
                            "key"=>"price",
                            "type"=>"number",
                            "required"=>true
                        ])
                        @include("admin.html.form.input",[
                            "label"=>"Product Thumbnail",
                            "key"=>"thumbnail",
                            "type"=>"file",
                            "required"=>true
                        ])
                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control" name="description">{{old("description")}}</textarea>
                        </div>
                        @include("admin.html.form.input",[
                            "label"=>"Quantity",
                            "key"=>"qty",
                            "type"=>"number",
                            "required"=>true
                        ])
                        <div class="form-group">
                            <label>Category</label>
                            <select name="category_id" class="form-control select2" required>
                                @foreach($categories as $item)
                                    <option @if(old("category_id")== $item->id) selected @endif  value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                            @error("category_id")
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>


        </div>
    </div>
@endsection
