<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ProductController extends Controller
{
    //
    public function index(){
    	return redirect('guest/product/show')->with('alert-danger','hello world');

    }

 
    public function show(){
              return view('product.index');
    }
       
}
