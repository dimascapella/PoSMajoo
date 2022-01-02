@extends('template.navbar')

@section('content')
<div class="container-fluid">
    <div class="row mx-3">
        <div class="col-md-4">
            <h4 class="mt-4 fw-bold">
                Data Produk
            </h4>
        </div>
        <div class="col-md-2"></div>
        <div class="col-md-4">
            <h4 class="mt-4">
                <div class="input-group flex-nowrap">
                    <form action="{{ route('product.create') }}" method="get">
                        @csrf
                        <span class="input-group-text">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                            </svg>
                        </span>
                        <input type="text" name="filter" class="form-control" placeholder="Filter Barang Dengan Kategori" value="{{ request('filter') }}">
                    </form>
                </div>
            </h4>
        </div>
        <div class="col-md-2 mt-4">
            <a href="{{ route('category.create') }}" class="btn btn-primary w-100">
                Tambah Produk
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-md text-center mt-3">
            @if(session()->has('success'))
            <p class="alert alert-primary">
                {{ session('success') }}
            </p>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-md">
            <div class="m-4">
                <div class="table-responsive"> 
                    <table class="table text-center">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Barang</th>
                                <th>Harga</th>
                                <th>Kategori</th>
                                <th>Foto</th>
                                <th>Deskripsi</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($data->count())
                            @foreach($data as $value)                            
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $value->product_name }}</td>
                                <td>Rp. {{ $value->price }}</td>
                                <td>{{ $value->product_id }}</td>
                                <td>
                                    @if($value->image)
                                    <img src="{{ asset('storage/' . $value->image) }}" style="width: 50%"/>
                                    @else
                                    <img src="{{ asset('storage/post-images/r.png') }}"  style="width: 50%" />
                                    @endif
                                </td>
                                <td>{{ $value->description }}</td>
                                <td class="d-flex gap-2">
                                    <a href="{{ route('product.edit', $value->id) }}" class="btn btn-primary">Edit</a>
                                    <form action="{{ route('product.destroy', $value) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="7">Produk Masih Kosong</td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                    {{ $data->appends(request()->input())->links() }}
                </div> 
            </div>
        </div>
    </div>
</div>
@endsection