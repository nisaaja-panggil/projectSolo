@extends('layout.template')
@section('judulh1','Admin - Customer')

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
            <h3 class="card-title">Ubah Data anggota</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('orang.update',$orang->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class=" card-body">
                <div class="form-group">
                    <label for="name">Nama anggota</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="" value="{{ $orang->name }}">
                </div>
                <div class="form-group">
                    <label for="gender">gender</label>
                    <input type="text" class="form-control" id="gender" name="gender" value="{{ $orang->gender}}">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ $orang->email }}">
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
