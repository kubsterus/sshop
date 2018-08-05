<?php

namespace App\Http\Controllers;

use App\Product;
use App\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index($id = 0)
    {
        $data = [];
        $product = new Product;
        $shop = new Shop;
        if($id != null){
            $product = Product::find($id);
            $shop = Shop::find($product->shop);
        }
        $data["product"] = $product;
        $data["shop"] = $shop;
        return view('auth.product', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product();
        if($request->id){
            $product = Product::find($request->id);
        }
        $product->link = $request->link;
        $product->shop = $request->shop;
        if(Input::file('photo') != null){
            Input::file('photo')->move(base_path().'/public/img', Input::file('photo')->getClientOriginalName());
            $product->photo =  Input::file('photo')->getClientOriginalName();
        }
        $product->save();
        return redirect('/admin/product/'.$product->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id = 0)
    {
        if($id!=0){
            Product::destroy($id);
        }
        return redirect("/admin/products");
    }
    public function all($page = 0){
        $data = [
            "page" => $page
        ];
        $products = Product::orderBy("id", "desc")->paginate(5);
        $data["products"] = $products;
        return view('auth.products', $data);
    }

}
