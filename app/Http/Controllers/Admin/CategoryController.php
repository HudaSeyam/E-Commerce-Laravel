<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Session;

class CategoryController extends BaseController
{
 
    public function index(Request $request)
    {
        $q = $request->q;
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
        $item = Category::find($id);
        if(!$item){
            Session::flash("msg", "e:Invalid ID in URL");
            return redirect(route("category.index"));
        }
        return view("category.edit", compact("item", "id"));
    }

    public function update(Request $request,Category $category)
    {
        $request->validate([
            "title"        =>  "required|unique:category,title,".request()->segment(3),
        ]);

        if ($request->hasFile('category_img')) {
            Storage::delete('public/images/' . $category->img);
            $request['img'] = basename($request->category_img->store('public/images'));
        }
        $category->update($request->all());

        Session::flash("msg","s: Category updated successfully");
        return redirect(route("category.index"));
    }
    public function trash(Request $request)
    {
        $q = $request->q;
        $items = Category::onlyTrashed();
        if($q){
            $items->whereRaw("(title like ?)", ["%$q%"]);
        }        
        $items =  $items->paginate(5)->appends([
            "q"         => $q,
        ]);
        return view("category.trash", compact("items"));

    }
    public function restore($id)
    {
        Category::withTrashed()->find($id)->restore();
        Session::flash("msg","s: Category restored successfully");
        return redirect(route("category.index"));
    }
    public function destroy($id)
    {
        $category=Category::withTrashed()->where('id',$id)->firstOrFail();
        if($category->trashed()){
            $category->forceDelete();
            Storage::delete($category->img);
            Session::flash("msg","s: Category deleted successfully");
            return redirect(route("category.trash"));
        }else{
            $category->delete();
            Session::flash("msg","s: Category trashed successfully");
            return redirect(route("category.index"));
        }
        
        
    }
}
