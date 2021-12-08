@extends('layouts.app') <!-- menghubungkan ke app.balde -->

@section('content') <!-- yang akan ditampilkan pada yield -->

<h1>Products Update</h1>
<hr/>

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('products.update', $product->id) }}" method="POST">
    @csrf
    @method('PUT')
    <!-- Edit data -->
    <input type="text" name="nama" class="form-control mb-3" placeholder="Nama" value="{{ $product->nama }}"/>
    <input type="number" name="harga" class="form-control mb-3" placeholder="Harga" value="{{ $product->harga}}"/>
    <textarea class="form-control mb-3" name="deskripsi" rows="4" placeholder="Deskripsi">{{ $product->deskripsi }}</textarea>
    <input type="file" name="foto" class="form-control mb-3" placeholder="Foto" value="{{ $product->foto}}"/>
    <button class="btn btn-primary float-end px-5" type="submit">Submit</button>
</form>
<a href="{{ route('products.index') }}" class="btn btn-primary" role="button" data-bs-toggle="button">Back</a>
@endsection
