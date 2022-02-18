<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function index(){
        $data=['products'=>Product::all()];
        return view('productPage.home',$data);
    }                                                                           
    public function store(Request $req){
        $req->validate([
            'title' => 'required',
            'brand' => 'required',
            'price' => 'required',
            'discount_price' => 'required',
            'category_id' => 'required',
            'qty' => 'required',

           
        ]);
         $pro=new Product();
         $pro->title=$req->title;
         $pro->brand=$req->brand;
         $pro->price=$req->price;
         $pro->discount_price=$req->discount_price;
         $pro->description=$req->description;

         $file=$req->image;
         $fileName=$file->getClientOriginalName();
         $file->move("product_image",$fileName);

         $pro->image=$fileName;
         $pro->qty=$req->qty;
         $pro->category_id=$req->category_id;
         $pro->save();
         return redirect()->route('product.home');
    }
    public function insert(){
         $data=[
             'category'=>Category::all(),
         ];
         return view('productPage.insert',$data);
    }
   
    public function edit(Request $req,$id){
        $data=Product::find($id);
        $data2=Category::all();
        return view("productPage.edit",["product"=>$data,'category'=>$data2 ]);


    }
    public function update(Request $req ,$id){
        $req->validate([
            'title' => 'required',
            'brand' => 'required',
            'price' => 'required',
            'discount_price' => 'required',
            'category_id' => 'required',
            'qty' => 'required',

           
        ]);
         $pro=Product::find($id);
         $pro->title=$req->title;
         $pro->brand=$req->brand;
         $pro->price=$req->price;
         $pro->discount_price=$req->discount_price;
         $pro->description=$req->description;

         $file=$req->image;
         $fileName=$file->getClientOriginalName();
         $file->move("product_image",$fileName);

         $pro->image=$fileName;
         $pro->qty=$req->qty;
         $pro->category_id=$req->category_id;
         $pro->save();
         return redirect()->route('product.home');
    
        

    }
    public function destroy($id){
        $pro=Product::find($id);
        $pro->delete();
        return redirect()->route('product.home');
    }
}
