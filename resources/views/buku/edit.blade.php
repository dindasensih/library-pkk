@extends('template')
@section('content')

   {{-- membuat form edit buku --}}
   
    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-header">Edit Buku</div>
                    <div class="card-body">
                        <form action="{{ route('buku.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                            @method('put')
                            @csrf
                            <div class="form-group mb-3">
                                <label for="" class="form-label">ISBN</label>
                                <input type="number" class="form-control" id="" name="isbn" value="{{ $data->isbn }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="" class="form-label">Judul</label>
                                <input type="text" class="form-control" id="" name="judul"value="{{ $data->judul }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="" class="form-label">Penerbit</label>
                                <input type="text" class="form-control" id="" name="penerbit"value="{{ $data->penerbit }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="" class="form-label">Sinopsis</label>
                                <input type="text" class="form-control" id="" name="sinopsis"value="{{ $data->sinopsis }}">
                            </div>
                            <div class="form-grup">
                                <label for="">Input Cover</label>
                              <input type="file" class="form-control" name="cover">
                              </div>
                              <div class="form-group">
                                <label for="" class="form-label">Kategori</label>
                                 <select class="form-select @error('kategori_id') is-invalid @enderror" aria-label="Default select example" name="kategori_id">
                                @foreach($kategori as $item)
                                    <option value="{{ $item->id }}" @selected($data->kategori_id==$item->id)>{{ $item->nama }}</option>
                                @endforeach
                                </select>
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
