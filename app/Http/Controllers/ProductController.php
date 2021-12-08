<?php

namespace App\Http\Controllers;

use App\Models\Product;
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
        $products = Product::all();
        return view('products.index', compact('products')); // digunakan untuk meanmpilkan semua data yang ada di database
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create'); // digunakan untuk mengarah ke view/product/create.blade.php
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([            // digunakan untuk membuat form validasi pada laravel
            'nama' => 'required',
            'harga' => 'required',
            'deskripsi' => 'required',
            'foto' => 'required'
        ]);

        $data = Product::create($request->all()); // membuat atau menginputkan data ke dalam database

        if ($request->file('foto')) {
            $request->file('foto')->move('fotoproduct/', $request->file('foto')->getClientOriginalName()); //memindahkan data atau file yang di inputkan ke dalam folder
            $data->foto = $request->file('foto')->getClientOriginalName(); // mengambil nama file
            $data->save(); // menyimpan data ke dalam database
        }

        return redirect()->route('products.index')->with('success', 'Data Berhasil di Tambahkan'); // dikembalikan ke tampilan awal
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('products.show', compact('product')); //menampilkan sebuah product
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('products.edit', compact('product')); // menampilkan form dan juga value data yang akan diubah
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([                // digunakan untuk membuat form validasi pada laravel
            'nama' => 'required',
            'harga' => 'required',
            'deskripsi' => 'required',
            'foto' => 'required'
        ]);
        // menginputkan data yang sudah diubah ke dalam kolom di tabel database
        $product->nama = $request->nama; 
        $product->harga = $request->harga;
        $product->deskripsi = $request->deskripsi;
        $product->foto = $request->foto;
        $product->save(); // menyimpan data ke dalam database yang sudah diinputkan
        return redirect()->route('products.index')->with('success', 'Data Berhasil di Ubah');  // dikembalikan ke tampilan awal
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();  // menghapus sebuah data
        return back(); // dikembalikan ke tampilan sebelumnya
    }
}
