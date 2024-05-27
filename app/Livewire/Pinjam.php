<?php

namespace App\Livewire;

use App\Models\anggota;
use App\Models\book;
use App\Models\pinjam_buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Pinjam extends Component
{
    public function render()
    {
        return view('livewire.pinjam',[
            'data'=>anggota::orderBy('id','desc')->get(),
            'databook'=>book::orderBy('id','desc')->get()
        ]);
        
    }
    public function store(Request $request, $id){
        $adminId=Auth::id();
      $validasi=$request->validate([
            "admin_id"=>$adminId,
            "anggota_id"=>"required",
            "book_id"=>$id,
            "name"=>"required",
            "tanggal_pinjam"=>"required",
            "tanggal_kembali"=>"required",
            "status"=>"required"
        ]);

        pinjam_buku::create($validasi);
        return redirect()->route('pinjam.index');
    }
}
