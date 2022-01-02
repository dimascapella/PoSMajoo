@extends('template.navbar')

@section('content')
<div class="container-fluid">
    <div class="row mx-3">
        <div class="col-md-4">
            <h4 class="mt-4 fw-bold">
                Data User
            </h4>
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
                                <th>Nama User</th>
                                <th>Email</th>
                                <th>is_Admin</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($data->count())
                            @foreach($data as $value)                            
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $value->name }}</td>
                                <td>{{ $value->email }}</td>
                                <td>
                                    @if($value->is_admin == 1)
                                    Admin
                                    @else
                                    User
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="4">User Masih Kosong</td>
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