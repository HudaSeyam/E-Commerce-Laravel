@extends("layouts._home")

@section("content")

<main class="mt-5 pt-4">
    <div class="container dark-grey-text mt-5">

      <!--Grid row-->
      @if(session()->has('message'))
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
          {{ session()->get('message') }}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
      </div>
       @endif
      <div class="row wow fadeIn">
        <!--Grid column-->
        <div class="col-md-6 mb-4">

          <img src='{{ asset("storage/images/".$item->img)}}' class="img-fluid" alt="">

        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-md-6 mb-4">

          <!--Content-->
          <div class="p-4">
          <p class="lead font-weight-bold">{{ $item->title }}</p>

            <div class="mb-3">
              <a href="">
                <span class="badge purple mr-1">{{$item->category->title}}</span>
              </a>
            </div>

            <p class="lead">
              <span class="mr-1">
              </span>
              <span>${{$item->price}}</span>
            </p>

            

            <p> {{$item->details }}</p>

            <form class="d-flex justify-content-left" action="{{route('cart.add')}}" method="POST">
            @csrf
              <!-- Default input -->
              <input type="number" value="1" name="qty" aria-label="Search" class="form-control" style="width: 100px">
              <button class="btn btn-primary btn-md my-0 p " type="submit">Add to cart
                <i class="fas fa-shopping-cart ml-1"></i>
              </button>
              <input type="hidden" value="{{$item->id }}" name="product_id">
            </form>

          </div>
          <!--Content-->

        </div>
        <!--Grid column-->

      </div>
      <!--Grid row-->

      <hr>

      <!--Grid row-->
      <div class="row d-flex justify-content-center wow fadeIn">

        <!--Grid column-->
    
        <!--Grid column-->

      </div>
      <!--Grid row-->

      <!--Grid row-->
      <div class="row wow fadeIn">

        <!--Grid column-->
        @foreach($images as $image)
        <div class="col-lg-4 col-md-12 mb-4">

          <img src='{{ asset("storage/ProductsImages/". $image->filename ) }}' class="img-fluid" alt="">

        </div>
        @endforeach
        <!--Grid column-->

        <!--Grid column-->

      </div>
      <!--Grid row-->
      <div style="margin: 15px 10px !important;"><button class="btn btn-primary btn-md my-0 p review" type="submit">Write Review
      </button>
    </div>
    @foreach($usersReviews as $userReview) 
      <div class="col-md-12">
        <h4 class="font-weight-bold">
        @if($userReview->user->img)
          <img style="width: 80px;" src="{{ asset("storage/images/".$userReview->user->img) }}" alt="img">
          @elseif(empty($userReview->user->img))
          <img style="width: 80px;border-radius: 100%;"  src="{{ asset('Ecommerce-master/img/user.png')}}">                                
          @endif   
         {{$userReview->user->name}} </h4>
        <p class="rating">

        @for($star=1; $star<=5; $star++)
        @if($userReview->rating >=$star)
        <i class="fa fa-star" aria-hidden="true"></i>
        @endif
        @endfor
        @if(($userReview->rating-floor($userReview->rating))== 0.5)
        <i class="fas fa-star-half-alt"></i>
        @endif
        @for($star=1; $star<=5; $star++)
        @if($userReview->rating <$star)
        <i class="far fa-star"></i>
        @endif
        @endfor
        <!--div class="user-rating jq-stars"></div--> 
            <!--i class="fa fa-star star_checked" aria-hidden="true"></i>
            <i class="fa fa-star star_checked" aria-hidden="true"></i>
            <i class="fa fa-star star_checked" aria-hidden="true"></i>
            <i class="fa fa-star " aria-hidden="true"></i>
            <i class="fa fa-star " aria-hidden="true"></i-->
            {{$userReview->rating}} Of 5</p>  
            <!--input type="hidden" value="{{--$userReview->rating--}}" id="rate"--> 
              
        <p>{{$userReview->text}}</p>

  </div>
  @endforeach
    <hr>
    </div>
  </main>
  @endsection
  @section("js")
  <script>
  $(".user-rating").starRating({
    starSize: 20,
    initialRating: $("#rate").val(),
    readOnly:true
 });
  </script>
  @endsection