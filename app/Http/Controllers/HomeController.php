<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductCategory;

class HomeController extends Controller
{
    //
    public function show(){
       return view ('home',[
            'product_categories'=> ProductCategory::with('products')->get()
        ]);
    }
}
