@extends("layouts._admin")

@section("title", "Users manegment")

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
            <a class="btn btn-success float-right mb-3" href="{{ route('users.create') }}"><i class='fa fa-plus'></i>create new user</a>
        </div>
 </form>
        @if($items->total()>0)
        <div class="alert alert-info mb-3"> there is {{ $items->total() }} result search</div>
            <div class="table-stats order-table ov-h">
                <table class="table ">
                    <thead>
                        <tr>
                            <th >#</th>
                            <th >Image</th>
                            <th>User name</th>
                            <th>Email </th>
                            <th>Role</th>
                            <th width=15%></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        @foreach($items as $item)
                            <td >{{ $item->id }}</td>
                            <td>
                                <div class="round-img">
                                @if($item->img)
                                <img class="rounded-circle" src="{{ asset("storage/images/".$item->img) }}" alt="img">
                                @elseif(empty($item->img))
                                <img class="rounded-circle"  src="{{ asset('Ecommerce-master/img/user.png')}}">                                
                                @endif
                                </div>
                            </td>
                            <td>  <span class="name">{{ $item->name }}</span> </td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->role }}</td>
                            <td class="text-right">
                                <a class="btn btn-sm btn-primary" href='{{ route("users.edit", ["id" => $item->id]) }}'><i class='fa fa-edit'></i></a>  
                                <a class="btn btn-sm btn-danger confirm " href='{{ route("users.delete", $item->id) }}'><i class='fa fa-trash'></i></a>
                                <a class="btn btn-sm btn-info " href='{{ route("users.show", $item->id) }}'><i class='fa fa-search'></i></a>
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