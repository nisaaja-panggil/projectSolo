@extends('layout.template')
@section('judulh1','data - book')

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

    <div class="card card-secondary">
        <div class="card-header">
            <h3 class="card-title">Data buku</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form method=" POST">
            @csrf
            @method('PUT')
            <div class=" card-body">
                <div class="col-md-6 d-flex align-items-center">
                    <img src="{{ asset('storage/' . $book->cover) }}" class="img-fluid rounded-start ml-3" style="height: 250px; object-fit: foto;">
                    </div>
                <div class="form-group">
                    <label for="judul">judul buku</label>
                    <input type="text" class="form-control" id="judul" name="judul" placeholder=""
                        value="{{ $book->judul }}" disabled>
                </div>
                <div class="form-group">
                    <label for="pengarang">pengarang</label>
                    <input type="text" class="form-control" id="pengarang" name="pengarang" value="{{ $book->pengarang }}"
                        disabled>
                </div>
                <div class="form-group">
                    <label for="penerbit">penerbit</label>
                    <input type="text" class="form-control" id="penerbit" name="penerbit" value="{{ $book->penerbit }}"
                        disabled>
                </div>
                <div class="form-group">
                    <label for="sinopsis">sinopsis</label><br>
                        <textarea class="form-control" name="sinopsis" id="sinopsis" cols="30" rows="10" value="{{ $book->sinopsis }}" disabled>{{ $book->sinopsis }}</textarea>
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">

            </div>
        </form>
    </div>
</div>
@endsection
