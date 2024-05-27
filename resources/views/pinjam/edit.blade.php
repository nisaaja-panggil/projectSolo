@extends('layout.template')
@section('judulh1', 'Admin - Buku')

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
            <h3 class="card-title">Ubah Data Buku</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('pinjam.update', $pinjam_buku->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="form-group">
                    <div class="mb-3">
                        <label for="status" class="form-label">status</label>
                        <select id="status" name="status"  value="{{ $pinjam_buku->status }}" class="form-label">
                          <option value="pinjam">pinjam</option>
                          <option value="kembali">kembali</option>
                        </select>
                      </div>
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-warning float-right">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection
