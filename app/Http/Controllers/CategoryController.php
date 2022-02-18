<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        return view("category_home",['category'=>Category::all()]);
    }
    public function store(Request $req){
        $req->validate([
            'cat_title' => 'required',
        ]);
           $data=new Category();
           $data->cat_title=$req->cat_title;
           $data->cat_descriptions=$req->cat_descriptions;
           $data->save();
           return redirect()->route('category.home');
    }
    public function edit($id){
          $data=Category::find($id);
          return view("category_edit",['category'=>$data]);

    }
    public function delete(Request $req,$id){
            $data=Category::find($id);
            $data->delete();
            return redirect()->route('category.home');
    }
    public function update(Request $req, $id){
        $req->validate([
            'cat_title' => 'required',
        ]);
           $data=Category::find($id);
           $data->cat_title=$req->cat_title;
           $data->cat_descriptions=$req->cat_descriptions;
           $data->save();
           return redirect()->route('category.home');
    }
}
