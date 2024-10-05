@extends("layouts._admin")

@section("title", "Category - trash")

@section("contant")
<form class="row mb-3">
        <div class="col-sm-3">
            <input type="text" value='{{ request()->q }}' name="q" autofocus class="form-control" />
        </div>
   
        <div class="col-sm-3">
            <button type="submit" class="btn btn-info"><i class='fa fa-search'></i> search</button>
        </div>
        <div class="col-sm-3">
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
                            <th>categoty name</th>
                            <th>created at</th>
                            <th width="30%"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        @foreach($items as $item)
                            <td >{{ $item->id }}</td>
                            <td>
                                <div class="round-img">
                                <img class="rounded-circle" src="{{ asset("storage/images/".$item->img) }}" alt="img">
                                </div>
                            </td>
                            <td>  <span class="name">{{ $item->title }}</span> </td>
                            <td>{{ $item->created_at }}</td>
                            <td class="text-right">
                         <a class="btn btn-sm btn-warning" href='{{ route("category.restore", ["id" => $item->id]) }}'>
                         <i class="fa fa-mail-reply-all"></i> Restore</a>
                         <a class="btn btn-sm confirm btn-danger" href='{{ route("category.delete", $item->id) }}'>
                         <i class="fa fa-trash"></i> Delete</a>
                           </td>
                            
                    
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div> <!-- /.table-stats -->
            {{ $items->links() }}
    @else
        <div class="alert alert-warning">
        Sorry, There is no categoty to show :(
        </div>
    @endif                             
@endsection