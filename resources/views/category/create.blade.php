@extends("layouts._admin")

@section("title", "Category")

@section("contant")

<form class="form-horizontal w-50"  enctype= "multipart/form-data" method="POST" action="{{ route('category.store') }}">
	 @csrf 
        <div class="form-group">
        <label for="title" class=" form-control-label">Category </label>
        <input type="text" id="title" value="{{ old('title') }}" name="title" placeholder="Enter your Category name" class="form-control">
        </div>
        <div class="row form-group">
            <div class="col col-md-3"><label for="category_img" class=" form-control-label">image</label></div>
            <div class="col-12 col-md-9"><input type="file" id="category_img" name="category_img" class="form-control-file"></div>
        </div>

    <button type="submit" class="btn btn-success ">create</button>
</form>
@endsection