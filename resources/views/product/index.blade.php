@extends("layouts._admin")

@section("title", "Product manegment")

@section("contant")
<form class="row">
        <div class="col-sm-3">
            <input type="text" value='{{ request()->q }}' name="q" autofocus class="form-control" />
        </div>
   
        <div class="col-sm-3">
            <button type="submit" class="btn btn-info"><i class='fa fa-search'></i> search</button>
        </div>
        <div class="col-sm-3">
        </div>
        <div class="col-sm-3">
            <a class="btn btn-success float-right mb-3" href="{{ route('product.create') }}"><i class='fa fa-plus'></i>create new product</a>
        </div>
 </form>
        @if($items->total()>0)
        <div class="alert alert-info mb-3"> there is {{ $items->total() }} result search</div>
            <div class="table-stats order-table ov-h">
                <table class="table ">
                    <thead>
                        <tr>
                            <th >#</th>
                            <th >image</th>
                            <th>product name</th>
                            <th>category name</th>
                            <th>details </th>
                            <th>quantity</th>
                            <th>price</th>
                            <th width=15%></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        @foreach($items as $item)
                            <td >{{ $item->id }}</td>
                            <td>
                                <div class="round-img">
                                <img class="rounded-circle" src='{{ asset("storage/images/".$item->img) }}' alt="img">
                                </div>
                            </td>
                            <td>  <span class="name">{{ $item->title }}</span> </td>
                            <td>{{ $item->category->title}}</td>
                            <td>{{ $item->details }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td><i class=" fa fa-dollar">{{ $item->price }}</i></td>
                            <!--td>
                            <div class="row form-group">
                                    <select name="select" id="select" class="form-control">
                                        <option value="0">Please select</option>
                                        <option value="1">edit</option>
                                    </select>
                            </div> 
                                    </td-->      
                    <td class="text-right">           
                        <a class="btn btn-sm btn-primary" href='{{ route("product.edit", ["id" => $item->id]) }}'><i class='fa fa-edit'></i></a>  
                        <a class="btn btn-sm btn-danger confirm" href='{{ route("product.delete", $item->id) }}'><i class='fa fa-trash'></i></a>
                        <a class="btn btn-sm btn-info " href='{{ route("product.show", $item->id) }}'><i class='fa fa-search'></i></a>
                    </td>
                    
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div> <!-- /.table-stats -->
            {{ $items->links() }}
    @else
        <div class="alert alert-warning">
        Sorry, there is no items to show :(
        </div>
    @endif                               
@endsection