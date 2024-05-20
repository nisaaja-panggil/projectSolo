<?php

namespace App\Http\Controllers;

use App\Models\pinjam_buku;
use Illuminate\Http\Request;

class pinjamcontroller extends Controller
{
    public function index()
    {
        return view('pinjam.index', [
            "title" => "pinjam",
            "data" => pinjam_buku::all()
        ]);
    }
    //
    public function create(){
        return view('pinjam.index')->with(["title"=>"tambah pinjam buku"]);   
    }

    public function store(Request $request, $id){
      $validasi=$request->validate([
            "admin_id"=>"required",
            "anggota_id"=>"required",
            "book_id"=>"required",
            "name"=>"required",
            "tanggal_pinjam"=>"required",
            "tanggal_kembali"=>"required",
            "status"=>"required"
        ]);

        pinjam_buku::create($validasi);
        return redirect()->route('pinjam.index');
    }

}
