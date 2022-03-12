<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    protected $product;
    protected $products;

    public function index(){
        return view('add-product');
    }

    public function create(Request $request){



        //Product::newProduct($request);// static function use kore model e data rakhte aibane call korte hbe aikhane direct product model er object create hocche and newProduct hocche akta function jekhane product create hocche
//        $this->product = new Product();
//        $this->product->newProduct();
        Product::newProduct($request);


        return redirect('/add-product')->with('message', 'Product Created Successfully');
    }


    public function manage(){
        $this->products = Product::orderby('id', 'desc')->get();
        return view('/manage-product', ['products' => $this->products]);
    }

    public function edit($id){
        $this->product = Product::find($id);
        return view('/edit-product', ['product' => $this->product]);
    }

    public function update(Request $request, $id){

        Product::updateProduct($request, $id);

        return redirect('/manage-product')->with('message', 'Product Updated Successfully');
    }

    public function delete($id){
        $this->product = Product::find($id);
        $this->product->delete();
        return redirect('/manage-product')->with('message', 'Product Deleted Successfully');

    }











}
