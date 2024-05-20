<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">

    @yield('tambahanCSS')
    <!-- IonIcons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css')}}">


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
                    <select id="status" name="status"  class="form-label">
                      <option value="pinjam">pinjam</option>
                      <option value="kembali">kembali</option>
                    </select>
                  </div>
                  
                 
                <!-- /.card-body -->
    
                <div class="card-footer">
                    <button type="submit" class="btn btn-success float-right">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
