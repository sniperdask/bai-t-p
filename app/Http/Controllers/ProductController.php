<?php

namespace App\Http\Controllers;

use App\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       
        // $data = DB::table('products')
        // ->select('id','name','slug','price')
        // ->where('id','<',20)
        // ->orwhere('name','mi band')->get();
        // dd($data);
        // $data = DB::table('products')->insert([
        //         'name'=>'Iphone 11 Pro Max 512GB Chính hãng (VN/A)01',
        //         'slug'=>'phone-11-pro-256gb-chinh-hang-vna(01)',
               
        //     ]);
        //     dd($data);

            // $data = DB::table('products')->where('id',25)->update(['name'=>'Linh']);
            // dd($data);
            // $data = DB::table('products')->paginate(5);
            // return view('Admin.product.index'.['productData'=>$data]);
            $productData = DB::table('products')->where('name','like','%'.$request->search.'%')
            ->paginate(15)
            ->appends(['search'=>$request->search]);

            return view('Admin.product.index',compact('productData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('Admin.product.create');
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
        $product->name = $request->nameProduct;
        $product->slug = str_slug($request->nameProduct);
        
        $product->save();
        return redirect()->route('product.index')->with('mess','Thêm Mới Thành Công');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(product $product)
    {
        //
    }
}
