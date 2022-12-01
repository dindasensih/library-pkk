@extends('template')

@section('content')
    <div class="container">
        @foreach ($data as $item)
            <div class="card mt-3" style="width: 200px;">
                <div class="card-body">
                    <h5 class="card-title">{{ $item['judul'] }}</h5>
                    <p class="card-text">{{ $item['cover'] }}</p>
                    <p class="card-date">{{ $item['sinopsis'] }}</p>
                    <p class="card-date">{{ $item['penerbit'] }}</p>
                </div>
            </div>
        @endforeach
    </div>
@endsection
