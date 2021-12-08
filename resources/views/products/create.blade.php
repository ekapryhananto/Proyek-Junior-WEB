@extends('layouts.app') <!-- menghubungkan ke app.balde -->

@section('content') <!-- yang akan ditampilkan pada yield -->

<h1>Tambah Products</h1>
<hr/>

<form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <!-- Input data -->
    <input type="text" name="nama" class="form-control mb-3" placeholder="Nama Product"/>
    <input type="number" name="harga" class="form-control mb-3" placeholder="Harga Product"/>
    <textarea class="form-control mb-3" name="deskripsi" rows="4" placeholder="Deskripsi Product"></textarea>
    <input type="file" name="foto" class="form-control mb-3" placeholder="Foto Product"/>
    <button class="btn btn-primary float-end px-5" type="submit">Submit</button>
</form>
<a href="{{ route('products.index') }}" class="btn btn-primary" role="button" data-bs-toggle="button">Back</a>


@endsection