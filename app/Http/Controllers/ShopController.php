<?php

namespace App\Http\Controllers;

use App\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;

class ShopController extends Controller
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

    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id = 0)
    {
        $data = [];
        $shop = new Shop;
        if($id != 0){
            $shop = Shop::find($id);
        }
        $data["shop"] = $shop;
        return view('auth.shop', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $shop = new Shop;
        if($request->id){
            $shop = Shop::find($request->id);
        }
        $shop->title = $request->title;
        $shop->domain = $request->domain;
        $shop->description = $request->description;
        $shop->manual = $request->manual;
        if(Input::file('logo') != null){
            Input::file('logo')->move(base_path().'/public/img', Input::file('logo')->getClientOriginalName());
            $shop->logo =  Input::file('logo')->getClientOriginalName();
        }

        $shop->code = $request->code;
        $shop->save();
        return redirect("/admin/shop/".$shop->id);
    }
    function jsonList(Request $request){
        $like = $request->like;
        $shops = Shop::where('domain', 'like', $like.'%')->limit(1)->get();
        return $shops->toArray();
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function show(Shop $shop)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function edit(Shop $shop)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Shop $shop)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if($id){
            Shop::destroy($id);
        }
        return redirect("/admin/shops");
    }
    public function all($page = 0){
        $data = [
            "page" => $page
        ];
        $shops = Shop::orderBy("id", "desc")->paginate(5);
        $data["shops"] = $shops;
        return view('auth.shops', $data);
    }
}
