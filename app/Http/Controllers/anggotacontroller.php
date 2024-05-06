<?php

namespace App\Http\Controllers;
use App\Models\anggota;
use Illuminate\Http\Request;
use illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class anggotacontroller extends Controller
{
    //
    public function index()
    {
        return view('anggota.tabel', [
            "title" => "anggota",
            "data" => anggota::all()
        ]);
    }
    public function create():View{
        return view('anggota.tambah')->with(["title"=>"tambah data anggota"]);
    }
    public function store(Request $request):RedirectResponse{
        $request->validate([
            "name"=>"required",
            "gender"=>"required",
            "email"=>"required",
        ]);
       anggota::create($request->all());
       return redirect()->route('orang.index')->with('success data','data customer berhasil ditambahkan');
    }
    public function edit(anggota $orang):view{
        return view('anggota.edit',compact('orang'))->with(["title"=>"ubah data anggota"]);
    }
    public function update(Request $request, anggota $orang):RedirectResponse{
        $request->validate([
            "name"=>"required",
            "gender"=>"required",
            "email"=>"required",
        ]);
       $orang->update($request->all());
       return redirect()->route('orang.index')->with('updated','data pelanggan berhasil di ubah');
    }
    public function show(anggota $orang):view{
        return view('anggota.tampil',compact('orang'))
                          ->with(["title"=>"data anggota"]);
    }
}
