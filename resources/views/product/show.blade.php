@extends("layouts._admin")

@section("title", "Prodcut  Details")

@section("contant")

    <p>
        Product Name: <b>{{ $item->title  }}</b>
    </p>
    <p>
       Category Name: <b>{{ $item->category->title }}</b>
    </p>
    @if($item->img)
    <p>
            <img src='{{ asset("storage/images/" . $item->img) }}' class="mt-2 w-50 img-fluid img-thumbnail" />

    </p>
    @endif
    <p>
        details: <b>{{ $item->details  }}</b>
    </p>
    <p>
       Quantity: <b>{{ $item->quantity }}</b>
    </p>
    <p>
        price: <b>{{ $item->price}}<i class='fa fa-dollar'></i></b>
    </p>
   
 
    <div class="text-right">           
        <a class="btn btn-sm btn-primary" href='{{ route("product.edit", ["id" => $item->id]) }}'><i class='fa fa-edit'></i> Edit</a>  
        <a class="btn btn-sm btn-danger confirm" href='{{ route("product.delete", $item->id) }}'><i class='fa fa-trash'></i> delete</a>
    </div>

@endsection