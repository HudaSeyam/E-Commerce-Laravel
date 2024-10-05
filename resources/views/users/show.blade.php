@extends("layouts._admin")

@section("title", "Prodcut  Details")

@section("contant")

    <p>
        User Name: <b>{{ $item->name }}</b>
    </p>
    @if($item->img)
    <p>
            <img src='{{ asset("storage/images/" . $item->img) }}' class="mt-2 w-50 img-fluid img-thumbnail" />

    </p>
    @endif
    <p>
        Email: <b>{{ $item->email }}</b>
    </p>
    <p>
        Type: <b>{{ $item->type }}</b>
    </p>
    <p>
        Mobile Number: <b>{{ $item->mobile }}</b>
    </p>
    <p>
        Location: <b>{{ $item->location }}</b>
    </p>
  
    <div class="text-right">           
        <a class="btn btn-sm btn-primary" href='{{ route("users.edit", ["id" => $item->id]) }}'><i class='fa fa-edit'></i> Edit</a>  
        <a class="btn btn-sm btn-danger confirm" href='{{ route("users.delete", $item->id) }}'><i class='fa fa-trash'></i> delete</a>
    </div>

@endsection