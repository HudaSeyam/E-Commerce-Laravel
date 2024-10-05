<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductImages;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use Session;

class ProductController extends BaseController
{
    
    public function index(Request $request)
    {
        $q = $request->q;
        //$items = Product::whereRaw("deleted = 0");
        if($q){
            $items->whereRaw("(title like ?)", ["%$q%"]);
        }        
        $items = Product::paginate(5)->appends([
            "q"         => $q,
        ]);
        return view("product.index", compact("items"));
    }

    public function create()
    {
        $items = Category::all();
        return view("product.create",compact("items")); 
    }

    public function store(ProductRequest $request)
    {
       if ($request->hasFile('product_img')) {
            $request['img'] = basename($request->product_img->store('public/images'));
       }

       $product = Product::create($request->all());
       
       if(!empty($request->MulImages)){
       foreach ($request->MulImages as $image) {
        $filename = basename($image->store('public/ProductsImages'));
        ProductImages::create([
            'product_id' => $product->id,
            'filename' => $filename
        ]);
       }}

        Session::flash("msg","s: Product created successfully");
        return redirect(route("product.create"));  
    }

    public function show($id)
    {
        $item = Product::find($id);
        if(!$item){
            Session::flash("msg", "e: Invalid ID in URL");
            return redirect(route("product.index"));
        }
        return view("product.show", compact("item", "id"));
    }

    public function edit($id)
    {
        $item = Product::find($id);
        $images=ProductImages::where('product_id',$id)->get();
        $Categories = Category::all();

        if(!$item){
            Session::flash("msg", "e:Invalid ID in URL");
            return redirect(route("product.index"));
        }
        return view("product.edit", compact("item", "id" ,"Categories","images"));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            "title"        =>  "required",
            "category_id"  =>  "required",
            "details"      =>  "required",
            "quantity"    =>  "required",
            "price"       =>  "required",
            ]);
    
            if ($request->hasFile('product_img')) {
                $request['img'] = basename($request->product_img->store('public/images'));
           }
           Product::find($id)->update($request->all());
           ProductImages::where('product_id',$id)->forceDelete();
           
           if(!empty($request->MulImages)){
            foreach ($request->MulImages as $image) {
             $filename = basename($image->store('public/ProductsImages'));
             ProductImages::create([
                'product_id' => $id,
                'filename' => $filename
            ]);
            }}
    
            Session::flash("msg","s: Product updated successfully");
            return redirect(route("product.index"));

    }

    public function destroy($id)
    {
        $product=Product::find($id);
        $product->delete();
        Session::flash("msg","s: Product deleted successfully");
        return redirect(route("product.index"));
    }
}
