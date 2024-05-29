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
    
        <div class="card bg-secondary">
            <div class="card-header">
                <h3 class="card-title">Tambah Data pinjam</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ route('pinjam.store') }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="card-body">
                  <div class="form-group">
                      <label for="anggota" class="form-label">Anggota</label>
                      <select class="form-control" name="anggota_id">
                          <option hidden>--Pilih Anggota--</option>
                          @foreach($data as $dt)
                          <option value="{{ $dt->id }}">{{ $dt->name }}</option>
                          @endforeach
                      </select><br>
          
                      <label for="buku" class="form-label">Buku</label>
                      <select class="form-control" name="book_id">
                          <option hidden>--Pilih Buku--</option>
                          @foreach($databook as $dt)
                          @if($dt->status !== 'pinjam')
                          <option value="{{ $dt->id }}">{{ $dt->judul }}</option>
                          @endif
                          @endforeach
                      </select><br>
          
                      <label for="tanggal_pinjam" class="form-label">Tanggal Pinjam</label>
                      <input type="date" class="form-control" id="tanggal_pinjam" name="tanggal_pinjam"><br>
          
                      <label for="tanggal_kembali" class="form-label">Tanggal Kembali</label>
                      <input type="date" class="form-control" id="tanggal_kembali" name="tanggal_kembali"><br>
          
                      <label for="status" class="form-label">status</label>
                      <select class="form-control" name="status">
                          <option hidden>--Pilih status--</option>
                          <option value="pinjam">pinjam</option>
                          <option value="kembali">kembali</option>
                      </select><br>
                    
                  </div>
              </div>
          
              <div class="card-footer">
                  <button type="submit" class="btn btn-primary float-right">Simpan</button>
              </div>
          </form>
          
        </div>
    </div>
</div>
