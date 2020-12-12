<?php

namespace App\Http\Controllers;

use App\products;
use App\sections;

use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sections = Sections::all();
        $products = Products::orderBy('id', 'DESC')->paginate(15);
        return view('products.index',compact('products','sections'));
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
         $request->except('pro_id') ;
        $this->validate($request, [

            'Product_name' => 'required|max:255,|unique:products,Product_name',
            'description' => 'required',
        ],[

            'Product_name.required' =>'يرجي ادخال اسم المنتج',
            'Product_name.unique' =>'اسم المنتج مسجل مسبقا',
            'description.required' =>'يرجي ادخال البيان',

        ]);

    products::create([
        'Product_name' => $request->Product_name,
        'description' => $request->description,
        'section_id' => $request->section_name,

    ]);
    session()->flash('statuscode','success');

   return redirect()->route('products.index')->with(['success' => 'تم اضافة المنتج  بنجاج']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\products  $products
     * @return \Illuminate\Http\Response
     */
    public function show(products $products)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit(products $products)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
         //return  $request;
           // search form section table or model in section name = request section name if equel return id
           // to store in section id in product table
         $id = sections::where('section_name', $request->section_name)->first()->id;

         $Products = Products::findOrFail($request->pro_id);

         $Products->update([
         'Product_name' => $request->Product_name,
         'description' => $request->description,
         'section_id' => $id,
         ]);

       session()->flash('statuscode','info');

       session()->flash('success', 'تم تعديل المنتج بنجاح');
       return back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy( Request $request,$id )
    {

        products::find($id)->delete();
        session()->flash('statuscode','error');

        session()->flash('success','تم حذف المنتج بنجاح');
        return redirect('/products');
    }
}
