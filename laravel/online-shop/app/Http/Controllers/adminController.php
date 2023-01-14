<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class adminController extends Controller
{
    function admin (){
        return view('admin');
    
    }
    function categories (){
        return view('Acategories')->with('categories',Category::all());
    
    }
}
