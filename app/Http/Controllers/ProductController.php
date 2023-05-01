<?php

namespace App\Http\Controllers;

use App\Produk;
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
        $user['listUser'] = Produk::all();
        return view('produk')->with($user);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //make function create produk 
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store(Request $request)
    {
        // dd($request->all());die();

        $fileName = '';
        if($request->image->getClientOriginalName()){
            $file = str_replace(' ', '', $request->image->getClientOriginalName());
            $fileName = date('mYdHs').rand(1,999).'_'.$file;
            $request->image->storeAs('public/produk', $fileName);
        }

        $user = Produk::create(array_merge($request->all(), [
            'image' => $fileName
        ]));
        return redirect('produk');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){

    }


    // public function editproduct($id)
    // {
    //     $editproduct = Produk::find($id);
    //     return view('editproduct', compact('editproduct'));
    // }

    // public function updateproduct(Request $request, $id)
    // {
    //     $update = Produk::find($id);
    //     $update->name = $request->name;
    //     $update->harga = $request->harga;
    //     $update->deskripsi = $request->deskripsi;
    //     $update->category_id = $request->category_id;

    //     $update->save();
    //     return redirect('produk');
    // }

    // public function deleteproduct($id)
    // {
    //     $deleteproduct = Produk::find($id);
    //     if($deleteproduct->delete()){
    //         return redirect()->back();
    //     }
    // }
}
