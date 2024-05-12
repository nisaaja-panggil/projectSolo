<?php

namespace App\Http\Controllers;

use App\Models\book;
use Illuminate\Http\Request;

class bookcontroller extends Controller
{
    //
    public function index(){
        return view('book.index',["title" => "koleksi buku","data"=>book::paginate(8)]);
       
    }

    public function cari(Request $request){
        $cari=$request->cari;
        $book=book::where('judul','LIKE','%'.$cari.'%')
                      ->paginate(8);
        return view('book.index',['data'=>$book])->with(["title"=>"cari buku"]);
    }
    public function create(){
        return view('book.create')->with(["title"=>"tambah data buku"]);   
    }

    public function store(Request $request){
      $validasi=$request->validate([
            "judul"=>"required",
            "pengarang"=>"required",
            "penerbit"=>"required",
            "sinopsis"=>"required",
            "status"=>"required",
            "cover"=>"image|file|max:1024"
        ]);
        if ($request->file('cover')){
            $validasi['cover']=$request->file('cover')->store('img');
        }

        book::create($validasi);
        return redirect()->route('book.index');
    }

    public function edit($id){
        $book=book::find($id);
        return view('book.edit')->with('book',$book)->with(["title"=>"tambah data buku"]);
    }
    public function update(book $book,request $request){
        $validasi=$request->validate([
            "judul"=>"required",
            "pengarang"=>"required",
            "penerbit"=>"required",
            "sinopsis"=>"required",
            "status"=>"required",
            "cover"=>"image|file|max:1024"
        ]);
        if ($request->file('cover')){
            $validasi['cover']=$request->file('cover')->store('img');
        }
        
        $book->update($validasi);
        return redirect()->route('book.index')->with(["title"=>"edit buku"]);
    }

    public function destroy($id){
        book::where('id',$id)->Delete();
        return redirect()->route(('book.index'));
    }
    public function show(anggota $orang):view{
        return view('anggota.tampil',compact('orang'))
                          ->with(["title"=>"data anggota"]);
    }
}
