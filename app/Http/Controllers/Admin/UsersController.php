<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use App\Admin;
use App\Http\Requests\UsersRequest;
use Illuminate\Http\Request;
use Session;

class UsersController extends BaseController
{
 
    public function index(Request $request)
    {
        $q = $request->q;
       // $items = User::whereRaw("deleted = 0");
        if($q){
            $items->whereRaw("(name like ?)", ["%$q%"]);
        }        
        $items =  User::paginate(5)->appends([
            "q"         => $q,
        ]);
        return view("users.index", compact("items"));
    }

    public function create()
    {
        return view("users.create");
    }

    public function store(UsersRequest $request)
    {
        $request['password'] = bcrypt($request->password);

      /* if ($request->hasFile('user_img')) {
            $request['img'] = basename($request->user_img->store('public/images'));
       }*/

       Admin::create($request->all());

        Session::flash("msg","s: User created successfully");
        return redirect(route("users.create"));
    }

    public function show($id)
    {
        $item = User::find($id);
        if(!$item){
            Session::flash("msg", "e: Invalid ID in URL");
            return redirect(route("users.index"));
        }
        return view("users.show", compact("item", "id"));
    }

    public function edit($id)
    {
        $item = User::find($id);
        if(!$item){
            Session::flash("msg", "e:Invalid ID in URL");
            return redirect(route("users.index"));
        }
        return view("users.edit", compact("item", "id"));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
        "name"        =>  "required",
        "type"         =>  "required",
        "email"        =>  "required",
        "location"     =>  "required",
        "mobile"       =>  "required",
        ]);

        if ($request->hasFile('user_img')) {
            $request['img'] = basename($request->user_img->store('public/images'));
       }
        User::find($id)->update($request->all());

        Session::flash("msg","s: User updated successfully");
        return redirect(route("users.index"));
    }
   
  
    public function destroy($id)
    {  
        $user=User::find($id);
        $user->delete();
        Session::flash("msg","s: User deleted successfully");
        return redirect(route("users.index"));
    }
}
