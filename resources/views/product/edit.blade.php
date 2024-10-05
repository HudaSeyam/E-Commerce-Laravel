@extends("layouts._admin")

@section("title", "Product")

@section("contant")
<form class="form-horizontal w-50"  enctype= "multipart/form-data" method="POST" action="{{ route('product.update', $item->id) }}">
	 @csrf 
     @method("put") 
        <div class="form-group"><label for="title" class=" form-control-label">Product name</label>
        <input type="text" id="title" value="{{ $item->title }}" name="title" placeholder="Enter your product name" class="form-control"></div>
        <div class="form-group m-form__group ">
		<label for="category_id">Category</label>
			<select class="form-control m-input"  name ="category_id" id="category_id">
            <option value="">Please select</option>
            @foreach($Categories  as $Category)
            <option {{ $item->category_id==$Category->id?"selected":"" }} value="{{ $Category->id }}">{{ $Category->title }} </option>  
            @endforeach
            </select>
	    </div>

        <div class="row form-group">
            <div class="col col-md-3">
            <label for="product_img" class=" form-control-label">image</label></div>
            <div class="col-12 col-md-9">
            <input type="file" id="product_img" name="product_img" class="form-control-file"></div>
        </div>
        @if($item->img)
            <img src='{{ asset("storage/images/" . $item->img) }}' class="mt-2 mb-3 w-50 img-fluid img-thumbnail" />
        @endif
        <div class="row form-group">
                        <div class="col col-md-3"><label for="MulImages[]" class=" form-control-label">Product images</label></div>
                        <div class="col-12 col-md-9"><input type="file" id="MulImages[]" name="MulImages[]" multiple="multiple" class="form-control-file"></div>
         </div>

        @foreach($images as $image)
            <img style="float: left;" src='{{ asset("storage/ProductsImages/". $image->filename ) }}' class="mb-3 w-50 img-fluid img-thumbnail" />
        @endforeach

        <div style="clear:both" class="form-group">
        <label for="details" class=" form-control-label">details</label>
        <input type="text" value="{{ $item->details }}" id="details" name="details" placeholder="product details" class="form-control">
        </div>
        <div class="form-group">
        <label for="quantity" class=" form-control-label">quantity</label>
        <input type="text" value="{{ $item->quantity }}" id="quantity" name="quantity" placeholder="Enter product quantity" class="form-control">
        </div>
        <div class="form-group">
        <label for="price" class=" form-control-label">Price</label>
        <input type="text" value="{{ $item->price }}" id="price" name="price" placeholder="Enter product quantity" class="form-control">
        </div>
        <button type="submit" class="btn btn-success ">Edit</button>	
        <a class="btn btn-dark" href="{{ route('product.index') }}">cancel</a>
</form>                     
@endsection