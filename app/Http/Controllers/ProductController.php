<?php

namespace App\Http\Controllers;
use App\Models\Product_unit;
use App\Models\Product;
use App\Models\Unit;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        Product::create($request->all());
       
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product, Request $request)
    {
       $result=0;
       $pivot_unit=1;
       if ($request->has('unit_id'))
       {
        $def_unit = Unit::find($request->unit_id);
        $pivot_unit=$def_unit->modifier;
       }
       $image_path="";
       if(!is_null($product->getImagePathAttribute))
        {
            $image_path=$product->getImagePathAttribute->path;
        }
       
       $result=$product->getTotalQuantityAttribute()/$pivot_unit;
       return response()->json([
        'total_quantity_by_unit_id' => $result,
        'total_quantity' => $result,
       'image_path'=> $image_path
       
        ]); 

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
