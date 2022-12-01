@extends('template')

@section('content')
    {{-- membuat tabel view Buku --}}

    <div class="container mt-3">
        <a href="{{ url('buku/create') }}" class="btn btn-primary">Tambah Buku</a>
        <div class="card shadow mb-3 mt-3">
            <div class="card-header text-center">Buku</div>
            <div class="card-body">
                <table class="table-responsive">
                    <table class="table table-bordered" cellspacing="0">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">ISBN</th>
                                <th scope="col">Judul</th>
                                <th scope="col">Penerbit</th>
                                <th scope="col">Sinopsis</th>
                                <th scope="col">Cover</th>
                                <th scope="col">Kategori</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <th>{{ $loop->iteration }}</th>
                                    <td>{{ $item['isbn'] }}</td>
                                    <td>{{ $item['judul'] }}</td>
                                    <td>{{ $item['penerbit'] }}</td>
                                    <td>{{ $item['sinopsis'] }}</td>
                                    <td><img src="{{ asset('storage/' . $item->cover) }}" width="100px"></td>
                                    <td>{{ $item->kategori->nama }}</td>
                                    <td><a href="{{ url('buku/' . $item->id . '/edit') }}"class="btn btn-primary">Edit</a>
                                        <a href="{{ url('buku/' . $item->id . '/delete') }}"class="btn btn-secondary">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
            </div>
        @endsection
