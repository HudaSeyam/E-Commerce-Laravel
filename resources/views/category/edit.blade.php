@extends("layouts._admin")

@section("title", "Edit Category")

@section("contant")

<form class="form-horizontal w-50"  enctype= "multipart/form-data" method="POST" action="{{ route('category.update', $item->id) }}">
	 @csrf
     @method("put") 
        <div class="form-group">
        <label for="title" class=" form-control-label">Category </label>
        <input type="text" id="title" value="{{ $item->title }}" name="title" placeholder="Enter your Category name" class="form-control">
        </div>
        <div class="row form-group">
            <div class="col col-md-3"><label for="category_img" class=" form-control-label">image</label></div>
            <div class="col-12 col-md-9"><input type="file" id="category_img" name="category_img" class="form-control-file"></div>
        </div>
        @if($item->img)
            <img src='{{ asset("storage/images/" . $item->img) }}' class="mt-2 w-50 img-fluid img-thumbnail" />
            @endif

     <div>      
	<button type="submit" class="btn btn-success ">Edit</button>
    <a class="btn btn-dark" href="{{ route('category.index') }}">cancel</a>
    </div> 
	
</form>
@endsection