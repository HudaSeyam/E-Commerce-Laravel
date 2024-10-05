<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;
use Session;

class ReviewsController extends BaseController
{
 
    public function index(Request $request)
    {
        $q = $request->q;
       // $items = Category::withTrashed();
        if($q){
            $items->whereRaw("(title like ?)", ["%$q%"]);
        }        
        $items = Category:: paginate(5)->appends([
            "q"         => $q,
        ]);
        return view("category.index", compact("items"));
    }

    public function create()
    {
        return view("category.create");
    }

    public function store(CategoryRequest $request)
    {
    
        if ($request->hasFile('category_img')) {
            $request['img'] = basename($request->category_img->store('public/images'));
       }
        Category::create($request->all());

        Session::flash("msg","s: Category created successfully");
        return redirect(route("category.create"));
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
    
    }

    public function update(Request $request, $id)
    {
        
    }
    public function trash(Request $request)
    {
        

    }
    public function restore($id)
    {
        
    }
    public function destroy($id)
    {
       
    }
}
