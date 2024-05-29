@extends('layout.template')
@section('judulh1', 'koleksi buku')
@section('konten')
    <div class="container">
        <div class="row mt-3">
            <div class="col-lg-3">
                <a href="{{ route('book.create') }}" class="btn btn-md btn-success">Tambah Data buku</a>
            </div>
            <div class="col-lg-9">
                <form action="{{ route('caribook') }}" method="POST">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Cari..." name="cari"
                            value="{{ request('cari') }}">
                        <button class="btn btn-outline-secondary" type="submit">Cari</button>
                    </div>
                </form>
            </div>
        </div>
        {{-- atas --}}
        <div class="row mt-5" >
        @foreach ($data as $book)
            <div class="col-lg-6" >
                <div class="card mb-3" style="max-width: 500px;" >
                    <div class="row g-0" >
                        <div class="col-md-4 d-flex align-items-center">
                        <img src="{{ asset('storage/' . $book->cover) }}" class="img-fluid rounded-start ml-3" style="height: 250px; object-fit: foto;">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                
                                <p class="card-text">judul buku : {{ $book->judul }}</p>
                                <p class="card-text">pengarang : {{ $book->pengarang }}</p>
                                <p class="card-text">penerbit: {{ $book->penerbit }}</p>
                               
                                <p class="card-text">status: {{ $book->status }}</p>
                                
                                <a href="{{ route('book.edit', $book->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                <a href="{{ route('book.show',$book->id) }}" class="btn btn-sm btn-success">Show</a>
                                <a href="{{ route('pinjam.create',$book->id) }}" class="btn btn-sm btn-success">pinjam</a>
                                <form action="{{ route('book.destroy', $book->id) }}" method="post" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" class="btn btn-sm btn-danger" value="Delete" onclick="return confirm('Apakah Anda yakin ingin menghapus buku ini?');">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <br>
        {{ $data->links() }}
    </div>
@endsection