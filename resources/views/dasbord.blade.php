@extends('layout.template')

@section('judulh1', 'Dashboard')

@section('konten')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Selamat Datang di Aplikasi Perpustakaan</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="text-center mb-4">
                    <img src="{{ asset('dist/img/perpus.jpg')}}" alt="Perpustakaan" class="img-fluid" style="max-height: 300px;">
                </div>
                <p>Aplikasi perpustakaan ini dirancang untuk membantu pengelola perpustakaan dalam manajemen koleksi buku, peminjaman, dan pengembalian buku. Anda dapat menggunakan fitur-fitur yang tersedia untuk:</p>
                <ul>
                    <li>Melihat daftar buku yang tersedia</li>
                    <li>Melakukan peminjaman buku</li>
                    <li>Melakukan pengembalian buku</li>
                    <li>Melihat riwayat peminjaman</li>
                    <li>Menambah, mengedit, atau menghapus data anggota perpustakaan</li>
                </ul>
                <p>Silakan jelajahi menu navigasi untuk menggunakan fitur-fitur tersebut. Jika Anda mengalami masalah atau memiliki pertanyaan, jangan ragu untuk menghubungi admin perpustakaan.</p>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
</div>
<!-- /.row -->
@endsection
