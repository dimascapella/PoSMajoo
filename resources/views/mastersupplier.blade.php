@extends('template.navbar')

@section('content')
<div class="container-fluid">
    <div class="row mx-3">
        <div class="col-md-10">
            <h4 class="mt-4 fw-bold">
                Data Supplier
            </h4>
        </div>
        <div class="col-md-2 mt-4">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCategory">Tambah Supplier</button>
        </div>
    </div>
    <div class="row">
        <div class="col-md">
            @if (session()->has('success'))
                <p class="alert alert-primary mt-2">{{ session('success') }}</p>
            @elseif (session()->has('error'))
                <p class="alert alert-danger mt-2">{{ session('error') }}</p>
            @endif
            <div class="m-4">
                <div class="table-responsive"> 
                    <table class="table text-center">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Supplier</th>
                                <th>Nama Perusahaan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($data->count())
                            @foreach($data as $value)                            
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $value->supplier_name }}</td>
                                <td>{{ $value->company_name }}</td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="3">Supplier Masih Kosong</td>
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
<div class="modal fade" id="modalCategory" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" >Tambah Supplier</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('supplier.store') }}" method="post">
            @csrf
        <div class="modal-body">
            @error('supplier_name')
            <label>
                <div class="text-danger">{{ $message }}</div>
            </label>
            @enderror
            
            @error('company_name')
            <label>
                <div class="text-danger">{{ $message }}</div>
            </label>
            @enderror
            <div class="mb-3">
                <label class="form-label">Nama Supplier</label>
                <input type="text" class="form-control @error('supplier_name') is-invalid @enderror" placeholder="Masukkan Supplier" name="supplier_name">
            </div>
            <div class="mb-3">
                <label class="form-label">Nama Perusahaan</label>
                <input type="text" class="form-control @error('company_name') is-invalid @enderror" placeholder="Masukkan Perusahaan" name="company_name">
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Tambahkan</button>
        </div>
    </form>
    </div>
</div>
</div>
@endsection