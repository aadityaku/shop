<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    function index(){
        $data=[
            'products'=>Product::all(),
            'category'=>Category::all(),
        ];
        return view("home",$data);
    }
    public function categoryFilter($cat_id){
        $data=[
            'products'=>Product::where(['category_id'=>$cat_id])->get(),
            'category'=>Category::all(),
        ];
        return view("home",$data);
    }
    public function singleView($pro_id){
        $data=[
            'products'=>Product::find($pro_id),
            'category'=>Category::all(),
        ];
        return view("singleView",$data);
    }
}
