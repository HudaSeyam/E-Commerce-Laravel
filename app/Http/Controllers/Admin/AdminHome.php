<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Session;

class AdminHome extends BaseController
{
 
    public function index()
    {
        return view("index");       
    }

   
}
