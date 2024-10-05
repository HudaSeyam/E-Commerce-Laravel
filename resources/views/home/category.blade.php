@extends("layouts._home")
@section("content")
<!--Navbar-->
<nav class="navbar navbar-expand-lg navbar-dark mdb-color lighten-3 mt-3 mb-5">
<!-- Navbar brand -->
<!-- Collapsible content -->
<div class="collapse navbar-collapse" id="basicExampleNav">
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
  @foreach($categories as $category)
  <div class="col-lg-3 col-md-6 mb-4">
    <!--Card style="width: 16rem; height:23rem "-->
    <div class="card">

    <!--Card image-->
    <div style="height:230px; overflow:hidden; background-image:url({{ asset("storage/images/" . $category->img) }});background-size:cover">
    </div>
      <!--Card image-->
      <!--Card content-->
      <div class="card-body text-center">
        <!--Category & Title-->
        <h5>
          <strong>
            <a class="dark-grey-text" href="{{ route('home.category', $category->id) }}"> {{$category->title}}
            </a>
          </strong>
        </h5>
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
{{$categories->appends(['search'=> request()->query('search') ])->links()}}
</nav>
<!--Pagination-->
@endsection





