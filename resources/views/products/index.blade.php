@extends('layouts.app') <!-- menghubungkan ke app.balde -->

@section('content') <!-- yang akan ditampilkan pada yield -->
<h1>Product Shopcomp</h1>
<a class="btn btn-info float-end" href="{{ route('products.create') }}">Tambah Product</a>

{{-- Display message --}}
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<!-- Tampilkan data -->
<table class="table table-striped table-hover">
    <thead>
        <tr></tr>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nama Product</th>
            <th scope="col">Harga Product</th>
            <th scope="col">Foto Product</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>

        @foreach ($products as $product) {{-- Loop products --}}
        <tr>
            <th scope="row">{{ $loop->iteration }}</th> <!-- Baris data -->
            <td>{{ $product->nama }}</td>               <!-- Nama Product -->
            <td>{{ $product->harga }}</td>              <!-- Harga Product -->
            <td>
                <img src="{{ asset('fotoproduct/'. $product->foto) }}" style="width: 50px;" alt=""> <!-- Foto Product -->
            </td>
            <td>

                <div class="dropdown"> {{-- Dropdown Action --}}
                    <button class="btn btn-danger btn-sm dropdown-toggle" type="button" id="actionDropdown"
                        data-mdb-toggle="dropdown" aria-expanded="false">
                        Action
                    </button>
                    <ul class="dropdown-menu btn-info" aria-labelledby="actionDropdown">
                        <li><a class="dropdown-item btn btn-success" href="{{ route('products.show', $product->id) }}">View</a></li> {{-- View --}}
                        <li><a class="dropdown-item btn btn-success" href="{{ route('products.edit', $product->id) }}">Edit</a></li> {{-- Edit --}}
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <form action="{{ route('products.destroy', $product->id) }}" method="post"> {{-- Delete --}}
                                @csrf
                                @method('delete')
                                <button type="submit" class="dropdown-item btn btn-danger">Delete</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </td>
        </tr>
        @endforeach

    </tbody>
</table>


@endsection