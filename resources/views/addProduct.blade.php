@extends('template.navbar')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md text-center mt-4">
            <h4 class="fw-bold">Tambah Produk</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8 d-flex justify-content-end">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCategory">Tambah Kategori</button>
        </div>
        <div class="col-md-2"></div>
    </div>
    <div class="row mt-4">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            @if (session()->has('success'))
                <p class="alert alert-primary">{{ session('success') }}</p>
            @elseif (session()->has('error'))
                <p class="alert alert-danger">{{ session('error') }}</p>
            @endif
            <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                @error('product_name')
                <label>
                    <div class="text-danger">{{ $message }}</div>
                </label>
                @enderror
                <div class="input-group mb-3">
                    <span class="input-group-text w-15">Nama Produk</span>
                    <input type="text" class="form-control @error('product_name') is-invalid @enderror" placeholder="Nama Produk" name="product_name">
                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                </div>
                @error('price')
                <label>
                    <div class="text-danger">{{ $message }}</div>
                </label>
                @enderror
                <div class="input-group mb-3">
                    <span class="input-group-text w-15">Rp. </span>
                    <input type="number" class="form-control @error('price') is-invalid @enderror" placeholder="Harga Produk" name="price">
                </div>  
                <div class="input-group mb-3">
                    <label class="input-group-text w-15">Kategori</label>
                    <select class="form-select customSelect" style="width: 85%" name="category_id">
                        <option selected>Pilih Kategori</option>
                        @foreach($data as $value)
                            <option value="{{ $value->id }}">{{ $value->category_name }}</option>
                        @endforeach
                    </select>
                </div> 
                <div class="input-group mb-3">
                    <label class="input-group-text w-15">Supplier</label>
                    <select class="form-select customSelect2" style="width: 85%" name="supplier_id">
                        <option selected>Pilih Supplier</option>
                        @foreach($dataSupplier as $valueSupplier)
                            <option value="{{ $valueSupplier->id }}">{{ $valueSupplier->supplier_name }}</option>
                        @endforeach
                    </select>
                </div> 
                @error('image')
                <label>
                    <div class="text-danger">{{ $message }}</div>
                </label>
                @enderror
                <div class="input-group mb-3">
                    <div class="row">
                        <div class="col-md-8">
                            <input type="file" class="form-control w-100" id="image" name="image" onchange="makeProgress()">
                        </div>
                        <div class="col-md-4">
                            <img class="img-preview img-fluid w-100" src="{{ asset('storage/post-images/r.png') }}" />
                        </div>
                    </div>
                </div> 
                <div class="progress">
                    <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                  </div> 
                @error('description')
                <label>
                    <div class="text-danger">{{ $message }}</div>
                </label>
                @enderror
                <div class="input-group d-flex flex-column mb-3">
                    <label class="fw-bold">Deskripsi Produk</label>
                    <input class="form-control" id="editor" type="hidden" name="description" />
                    <trix-editor input="editor"></trix-editor>
                </div>
                <button type="submit" class="btn btn-primary">Tambahkan</button>   
            </form>
            </div>
        <div class="col-md-2"></div>
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
<script src="https://cdn.ckeditor.com/ckeditor5/31.1.0/classic/ckeditor.js"></script>
<script>
    document.addEventListener('trix-file-accept', function(e){
        e.preventDefault();
    })
</script>
<script>
    var bar = document.querySelector(".progress-bar");
    var i = 0;
    var timer;
    function makeProgress(){
        console.log(i);
        if(i < 100){
            i = i + 1;
            bar.style.width = i + "%";
            bar.innerText = i + "%";
        }

        var timer = setTimeout("makeProgress()", 50);
        if (i >= 100){
            previewImage();
            clearTimeout(timer);
            i = 0;
        }
    }

    function previewImage(){
        const image = document.querySelector('#image');
        const preview = document.querySelector('.img-preview');
        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);
    
        oFReader.onload = function(oFREvent){
            preview.src = oFREvent.target.result;
        }
    }
</script>

@endsection