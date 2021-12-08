@extends('layouts.app') <!-- menghubungkan ke app.balde -->

@section('content') <!-- yang akan ditampilkan pada yield -->
    <h1>Products Show</h1>
    <hr/>

    <div class="bg-dark text-white rounded p-3">
        <h5 class="text-warning">Nama</h5>                  {{-- Nama Product --}}
        <p class="fw-bold">{{ $product->nama }}</p>

        <h5 class="text-warning">Harga</h5>                 {{-- Harga Product --}}
        <p class="fw-bold"> {{ $product->harga }}</p>

        <h5 class="text-warning">Deskripsi</h5>             {{-- Deskripsi Product --}}
        <p class="fw-bold">{{ $product->deskripsi }}</p>

        <h5 class="text-warning">Foto</h5>
        <img src="{{ asset('fotoproduct/'. $product->foto) }}" style="width: 50px;" alt="">     {{-- Foto Product --}}
    </div>
    <a href="{{ route('products.index') }}" class="btn btn-primary" role="button" data-bs-toggle="button">Back</a>
@endsection