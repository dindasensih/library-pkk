@extends('template')
@section('content')

   {{-- membuat form edit kategori --}}

    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-header">Edit User</div>
                    <div class="card-body">
                        <form class="form-horizontal" action="{{ route('users.update', $data->id) }}" method="POST">
                            @method('put')
                            @csrf
                            <div class="form-group mb-3">
                                <label for="" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="" name="name" value="{{ $data->name }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="" class="form-label">Email</label>
                                <input type="text" class="form-control" id="" name="email" value="{{ $data->email }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="" class="form-label">Role</label>
                                <div class="col-sm-8">
                                    <select class="form-control" name="role">
                                        <option selected value="" disabled>Pilih Role</option>
                                        <option value="admin" @if('admin' == $data->role) @selected($data->role== 'admin') @endif>Admin</option>
                                        <option value="editor" @if('editor' == $data->role) @selected($data->role== 'editor') @endif>Editor</option>  
                                    </select>
                                </div>
                            <div class="form-group mb-3">
                                <label for="" class="form-label">Password</label>
                                <input type="password" class="form-control" id="" name="password" value="{{ $data->email }}">
                            </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection