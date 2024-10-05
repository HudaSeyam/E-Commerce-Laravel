@extends("layouts._admin")

@section("title", "Product")

@section("contant")
<form class="form-horizontal w-50"  enctype= "multipart/form-data" method="POST" action="{{ route('product.store') }}">
	 @csrf 
        <div class="form-group"><label for="title" class=" form-control-label">Product name</label>
        <input type="text" id="title"  name="title" value="{{ old('title') }}" placeholder="Enter your product name" class="form-control"></div>
        <div class="form-group m-form__group ">
		<label for="category_id">Category</label>
			<select class="form-control m-input"  name ="category_id" id="category_id">
            <option value="">Please select</option>
            @foreach($items as $item)
            <option {{ old("category_id")==$item->id?"selected":"" }} value="{{ $item->id }}">{{ $item->title }} </option>  
            @endforeach
            </select>
	    </div>

        <div class="row form-group">
            <div class="col col-md-3">
            <label for="product_img" class=" form-control-label">image</label></div>
            <div class="col-12 col-md-9">
            <input type="file" id="product_img" name="product_img" class="form-control-file"></div>
        </div>
        <div class="row form-group">
                        <div class="col col-md-3"><label for="MulImages[]" class=" form-control-label">Product images</label></div>
                        <div class="col-12 col-md-9"><input type="file" id="MulImages[]" name="MulImages[]" multiple="multiple" class="form-control-file"></div>
         </div>
        <div class="form-group">
        <label for="details" class=" form-control-label">details</label>
        <input type="text" id="details" value="{{ old('details') }}" name="details" placeholder="product details" class="form-control">
        </div>
        <div class="form-group">
        <label for="quantity" class=" form-control-label">quantity</label>
        <input type="text" id="quantity" name="quantity" value="{{ old('quantity') }}" placeholder="Enter product quantity" class="form-control">
        </div>
        <div class="form-group">
        <label for="price" class=" form-control-label">Price</label>
        <input type="text" id="price" name="price" value="{{ old('price') }}" placeholder="Enter product price" class="form-control">
        </div>
        <button type="submit" class="btn btn-success ">create</button>

</form>                     
@endsection