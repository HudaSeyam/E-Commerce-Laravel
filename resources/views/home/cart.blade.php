@extends("layouts._home")
@section("content")
  <!--Main layout-->
  <main >
    <div class="container wow fadeIn">

      <!-- Heading -->
      <h2 class="my-5 h2 text-center">Shopping Cart</h2>

          <!-- Heading -->
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">Your cart</span>
            <span class="badge badge-secondary badge-pill">{{Cart::count()}}</span>
          </h4>

          <!-- Cart -->
          <ul class="list-group mb-3 z-depth-1">
          <table class="table">
          <thead>
            <tr>
                <th width="10%">DELETE</th>
                <th width="20%">IMAGE</th>
                <th width="20%">PRODUCT</th>
                <th width="20%">QUANTITY</th>
                <th width="20%">PRICE</th>
                <th width="20%">TOTAL</th>
            </tr>
          </thead>
        @foreach(Cart::content() as $product)
        <tbody>
            <tr>
                <td>
                <a class="nav-link waves-effect" href="{{route('cart.delete',['id' =>$product->rowId])}}">
                    <i class="fas fa-trash"  style="color:Crimson;font-size: 1.5em;"></i>
                </a>
                </td>

                <td>
                    <img style="max-height: 200px; max-width: 200px;"src='{{asset("storage/images/". $product->model->img)}}' alt="..." class="img-thumbnail" >
                </td>
                
                <td>
                    <h6 class="my-0">{{$product->name}}</h6>
                </td>

                <td>
                <input type="number" value="{{$product->qty}}" data-id="{{$product->rowId}}" name="qty" class="qty form-control" style="width: 100px">
                </td>

                <td>
                    <h6 class="my-0">${{$product->price}}</h6>
                </td>

                <td>
                    <h6 class="my-0">${{$product->total()}}</h6>
                </td>
            </tr>
        </tbody>
        @endforeach
        </table>
            <li class="list-group-item d-flex justify-content-between bg-light">
              <div class="text-success">
                <h6 class="my-0">Promo code</h6>
                <small>EXAMPLECODE</small>
              </div>
              <span class="text-success">-$5</span>
            </li>
            <li class="list-group-item d-flex justify-content-between">
              <span>Total (USD)</span>
              <strong>$ {{Cart::total()}}</strong>
            </li>
          </ul>
          <!-- Cart -->

          <!-- Promo code -->
          <form class="card p-2">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Promo code" aria-label="Recipient's username" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-secondary btn-md waves-effect m-0" type="button">Redeem</button>
              </div>
            </div>
          </form>
          <!-- Promo code -->
          <hr class="mb-4">
          <a href="{{route('cart.checkout')}}">
            <button class="btn btn-secondary btn-lg " >Continue to checkout</button>
          </a>
        </div>
  </main>
  <!--Main layout-->
@endsection
@section("js")
<script>
$( ".qty" ).change(function() {
  var new_qty = $( this ).val();
  var id = $(this).attr("data-id") 
  var url = "/cart/update/"+id+'/'+new_qty;
  $.get( url );
});
</script>
@endsection