@extends('template.navbar')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md text-center mt-4">
            <h4 class="fw-bold">Edit Produk</h4>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            @if (session()->has('success'))
                <p class="alert alert-primary">{{ session('success') }}</p>
            @elseif (session()->has('error'))
                <p class="alert alert-danger">{{ session('error') }}</p>
            @endif
            <form method="POST" action="{{ route('product.update', $dataProduct->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                @error('product_name')
                <label>
                    <div class="text-danger">{{ $message }}</div>
                </label>
                @enderror
                <div class="input-group mb-3">
                    <span class="input-group-text w-15">Nama Produk</span>
                    <input type="text" class="form-control @error('product_name') is-invalid @enderror" placeholder="Nama Produk" name="product_name" value="{{ $dataProduct->product_name }}">
                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                </div>
                @error('price')
                <label>
                    <div class="text-danger">{{ $message }}</div>
                </label>
                @enderror
                <div class="input-group mb-3">
                    <span class="input-group-text w-15">Rp. </span>
                    <input type="number" class="form-control @error('price') is-invalid @enderror" placeholder="Harga Produk" name="price" value="{{ $dataProduct->price }}"" >
                </div>  
                <div class="input-group mb-3">
                    <label class="input-group-text w-15">Kategori</label>
                    <select class="form-select customSelect" style="width: 85%" name="category_id">
                        <option selected value="{{ $dataProduct->category_id }}">{{ $dataProduct->category->category_name }}</option>
                        @foreach($data as $value)
                            <option value="{{ $value->id }}">{{ $value->category_name }}</option>
                        @endforeach
                    </select>
                </div> 
                <div class="input-group mb-3">
                    <label class="input-group-text w-15">Supplier</label>
                    <select class="form-select customSelect" style="width: 85%" name="supplier_id">
                        <option selected value="{{ $dataProduct->supplier_id }}">{{ $dataProduct->supplier->supplier_name }}</option>
                        @foreach($dataSupplier as $valueSupplier)
                            <option value="{{ $valueSupplier->id }}">{{ $valueSupplier->supplier_name }}</option>
                        @endforeach
                    </select>
                </div> 
                <div class="input-group mb-3">
                    @error('image')
                    <label>
                        <div class="text-danger">{{ $message }}</div>
                    </label>
                    @enderror
                    <div class="row">
                        <div class="col-md-8">
                            <input type="hidden" name="oldImage" value="{{ $dataProduct->image }}">
                            <input type="file" class="form-control" id="image" name="image" onchange="makeProgress()" value="{{ $dataProduct->image }}">
                        </div>
                        <div class="col-md-4">
                            @if ($dataProduct->image)
                                <img src="{{ asset('storage/'. $dataProduct->image) }}"             class="img-preview img-fluid w-100" /> 
                            @else
                                <img class="img-preview img-fluid w-100" />                        
                            @endif
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
                    <input class="form-control" id="editor" type="hidden" name="description" value={{ $dataProduct->description }} />
                    <trix-editor input="editor"></trix-editor>
                </div>
                <button type="submit" class="btn btn-primary">ubah Data</button>   
            </form>
            </div>
        <div class="col-md-2"></div>
    </div>
</div>
<script src="https://cdn.ckeditor.com/ckeditor5/31.1.0/classic/ckeditor.js"></script>
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
<script>
    document.addEventListener('trix-file-accept', function(e){
        e.preventDefault();
    })
</script>

@endsection