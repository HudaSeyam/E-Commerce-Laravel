@extends("layouts._home")
@section("content")
<!--Navbar-->
<nav class="navbar navbar-expand-lg navbar-dark mdb-color lighten-3 mt-3 mb-5">
<!-- Navbar brand -->
<span class="navbar-brand">Categories:</span>
<!-- Collapse button -->
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
  aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
</button>

<!-- Collapsible content -->
<div class="collapse navbar-collapse" id="basicExampleNav">

  <!-- Links -->
  <ul class="navbar-nav mr-auto">
  <li class="nav-item {{ Request::routeIs('home.all') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('home.all')}}">All
      <span class="sr-only">(current)</span>
    </a>
  </li>
  @foreach($categories as $category)
    <li class="nav-item ">
      <a class="nav-link" href="{{ route('home.category', $category->id) }}">{{$category->title}}
      </a>
    </li>
    @endforeach
  </ul>
  <!-- Links -->

  <form class="form-inline">
    <div class="md-form my-0">
      <input class="form-control mr-sm-2" value="{{request()->query('search')}}" type="text" name="search" placeholder="Search" aria-label="Search">
    </div>
  </form>
</div>
<!-- Collapsible content -->

</nav>
<!--/.Navbar-->
<!--Section: Products v.3-->
<section class="text-center mb-4">
<!--Grid row-->
<div class="row wow fadeIn">

  <!--Grid column-->
  @foreach($products as $product)
  <div class="col-lg-3 col-md-6 mb-4">
    <!--Card style="width: 16rem; height:23rem "-->
    <div class="card">

    <!--Card image-->
    <div style="height:230px; overflow:hidden; background-image:url({{ asset("storage/images/" . $product->img) }});background-size:cover">
    </div>
      <!--Card image-->
      <!--Card content-->
      <div class="card-body text-center">
        <!--Category & Title-->
        <a href="{{ route('home.category',$product->category->id) }}" class="grey-text">
          <h5>{{$product->category->title}}</h5>
        </a>
        <h5>
          <strong>
            <a href="{{asset('/product/details/'.$product->id)}}" class="dark-grey-text"> {{$product->title}}
            </a>
          </strong>
        </h5>
        <h4 class="font-weight-bold blue-text">
          <strong>${{$product->price}}</strong>
        </h4>
        <a href="{{route('cart.rapid.add',['id' => $product->id] )}}" class="btn btn-danger btn-sm"><i class="fas fa-shopping-cart"></i>add</a>
        <a href="{{asset('/product/details/'.$product->id)}}" class="btn btn-info btn-sm"> <i class="fas fa-telescope"></i> show</a>
      </div>
      <!--Card content-->
    </div>
    <!--Card-->
  </div>
  @endforeach
</div>
<!--Grid row-->
</section>
<!--Section: Products v.3-->
          
<!--Pagination-->
<nav class="d-flex justify-content-center wow fadeIn">
{{$products->appends(['search'=> request()->query('search') ])->links()}}
</nav>
<!--Pagination-->
@endsection
