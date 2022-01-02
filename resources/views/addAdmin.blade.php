@extends('template.navbar')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md text-center mt-4">
            <h4 class="fw-bold">Mendaftarkan Admin</h4>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            @if (session()->has('success'))
                <p class="alert alert-primary">{{ session('success') }}</p>
            @elseif (session()->has('error'))
                <p class="alert alert-danger">{{ session('error') }}</p>
            @endif
            <form action="{{ route('registerAdmin') }}" method="post">
                @csrf
                @error('name')
                <label>
                    <div class="text-danger">{{ $message }}</div>
                </label>
                @enderror
                <div class="input-group mb-3">
                    <span class="input-group-text w-25">Nama</span>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Nama Admin" name="name">
                </div>
                @error('email')
                <label>
                    <div class="text-danger">{{ $message }}</div>
                </label>
                @enderror
                <div class="input-group mb-3">
                    <span class="input-group-text w-25">Email</span>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" name="email">
                </div>  
                @error('password')
                <label>
                    <div class="text-danger">{{ $message }}</div>
                </label>
                @enderror
                <div class="input-group mb-3">
                    <span class="input-group-text w-25">Password</span>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password">
                </div>  
                <button type="submit" class="btn btn-primary">Daftar</button>   
            </form>
            </div>
        <div class="col-md-4"></div>
    </div>
</div>
<div class="modal fade" id="modalCategory" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" >Tambah Kategori</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('category.store') }}" method="post">
            @csrf
        <div class="modal-body">
            <div class="mb-3">
                <label class="form-label">Nama Kategori</label>
                <input type="text" class="form-control @error('price') is-invalid @enderror" placeholder="Masukkan Kategori" name="category_name">
              </div>
              @error('category_name')
              <label>
                  <div class="text-danger">{{ $message }}</div>
              </label>
              @enderror
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Tambahkan</button>
            </div>
        </form>
      </div>
    </div>
  </div>

@endsection