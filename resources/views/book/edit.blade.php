@extends('layout.template')
@section('judulh1','Admin - buku')

@section('konten')
<div class="col-md-6">
    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title">Ubah Data buku</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{route('book.update', $book->id)}}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class=" card-body">
            <div class="form-group">
              <div class="mb-3">
                <label for="judul" class="form-label">judul buku</label>
                <input type="text" class="form-control" id="judul" name="judul"  value="{{$book->judul}}">
              </div>
              <div class="mb-3">
                <label for="pengarang" class="form-label">pengarang</label>
                <input type="text" class="form-control" id="pengarang" name="pengarang" value="{{$book->pengarang}}">
              </div>
              <div class="mb-3">
                <label for="penerbit" class="form-label">penerbit</label>
                <input type="text" class="form-control" id="penerbit" name="penerbit" value="{{$book->penerbit}}">
              </div>
              <div class="mb-3">
                <label for="sinopsis" class="form-label">sinopsis</label>
                <input type="text" class="form-control" id="sinopsis" name="sinopsis" value="{{$book->sinopsis}}">
              </div>
              <div class="mb-3">
                <label for="status" class="form-label">status</label>
                <input type="text" class="form-control" id="status" name="status" value="{{$book->status}}">
              </div>
              <div class="mb-3">
                <label for="cover" class="form-label">cover</label>
                <input type="file" class="form-control" id="cover" name="cover" value="{{$book->cover}}">
              </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-warning float-right">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection
