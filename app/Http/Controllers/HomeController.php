<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ReviewsRequest;
use App\User;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductImages;
use App\Models\Reviews;
use App\Http\Requests\UsersRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Session;

class HomeController extends Controller
{
   
    public function __construct()
    {
        //$this->middleware('auth');
    }

    
    public function index()
    {
        $products = Product::orderBy('id','desc')->Searched()->paginate(8);     
        $categories = Category::take(5)->get();
        return view('home',compact("products","categories"));
    }
    public function category($id)
    { 
      /*  $category_id=$request->category_id;
        $categories = Category::get();
        $products = Product::orderBy('id','desc')->where(function($q) use ($category_id){
            if($category_id != ""){
                $q->where("category_id", $category_id);
            }
        })->take(6)->get(); 
        return view('home',compact("products" ,"categories"));*/
        $products = Product::orderBy('id','desc')->where("category_id",$id)->Searched()->paginate(1);      
        $categories = Category::take(5)->get();
        return view('home',compact("products","categories"));

    }
    public function categories(Request $request)
    { 
        $categories = Category::Searched()->paginate(4);
        return view('home.category',compact("categories"));

    }
    public function all(){
        $products = Product::orderBy('id','desc')->Searched()->paginate(1);      
        $categories = Category::take(5)->get();
        return view('home',compact("products","categories"));
    }
    public function detail($id){
        $item = Product::find($id);
        $usersReviews=Reviews::orderBy('id','desc')->take(4)->where("product_id",$id)->get(); 
        $images = ProductImages::where("product_id",$id)->get();
        if(!$item){
            Session::flash("msg", "e:Invalid ID in URL");
            return redirect(route("home"));
        }
        return view('home.details',compact("item","images","usersReviews"));
    }
   
    public function Review(ReviewsRequest $request){ 
      $exists = Reviews:: whereRaw('(user_id = ? and product_id = ?)',[Auth::user()->id ,$request->product_id])->first();
      if(!$exists) {
           Reviews::create($request->all()+ [
            'user_id' => Auth::user()->id
        ]);
           }
        else{
            return redirect()->back()->with('message', 'you can not review this product twice');
        }
       return redirect(asset('/details/.$request->product_id'));
    }
    public function userRegister(){
        return view('home.userRegister');
    }
    public function userStore(UsersRequest $request)
    {
        $request['password'] = bcrypt($request->password);

       if ($request->hasFile('user_img')) {
            $request['img'] = basename($request->user_img->store('public/images'));
       }
        User::create($request->all());
        return redirect(route('home'));
    }

}
