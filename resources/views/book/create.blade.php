@extends('layout.template')
@section('judulh1',' - Anggota')

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

    <div class="card card-success">
        <div class="card-header">
            <h3 class="card-title">Tambah Data anggota</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{route('book.store')}}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class=" card-body">
            <div class="form-group">
              <div class="mb-3">
                <label for="judul" class="form-label">judul buku</label>
                <input type="text" class="form-control" id="judul" name="judul">
              </div>
              <div class="mb-3">
                <label for="pengarang" class="form-label">pengarang</label>
                <input type="text" class="form-control" id="pengarang" name="pengarang">
              </div>
              <div class="mb-3">
                <label for="penerbit" class="form-label">penerbit</label>
                <input type="text" class="form-control" id="penerbit" name="penerbit">
              </div>
              <div class="mb-3">
                <label for="sinopsis" class="form-label">sinopsis</label>
                <input type="text" class="form-control" id="sinopsis" name="sinopsis">
              </div>
              <div class="mb-3">
                <label for="cover" class="form-label">cover</label>
                <input type="file" class="form-control" id="cover" name="cover">
              </div>
              <div class="mb-3">
                <label for="status" class="form-label">status</label>
                <select class="form-control" name="status">
                    <option hidden>--Pilih status--</option>
                    <option value="pinjam">pinjam</option>
                    <option value="kembali">kembali</option>
                </select><br>
              
             
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-success float-right">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection
