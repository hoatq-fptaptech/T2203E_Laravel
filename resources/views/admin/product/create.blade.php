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
                <form method="post" action="{{url("/admin/product/create")}}" role="form">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label>Product Name</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Product Price</label>
                            <input type="number" name="price" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Product Thumbnail</label>
                            <input type="text" name="thumbnail" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control" name="description"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Quantity</label>
                            <input type="number" name="qty" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Category</label>
                            <select name="category_id" class="form-control select2" required>
                                @foreach($categories as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
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
