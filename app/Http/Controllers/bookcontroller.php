<?php

namespace App\Http\Controllers;

use App\Models\book;
use Illuminate\Http\Request;

class bookcontroller extends Controller
{
    //
    public function index(){
        return view('book.index',["data"=>book::paginate(8)]);
    }

    public function cari(Request $request){
        $cari=$request->cari;
        $book=book::where('nama','LIKE','%'.$cari.'%')
                      ->paginate(8);
        return view('book.index',['data'=>$book]);
    }
    public function create(){
        return view('book.create');   
    }

    public function store(Request $request){
      $validasi=$request->validate([
            "name"=>"required",
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
        return view('book.edit')->with('book',$book);
    }

    public function update(book $book,request $request){
        $validasi=$request->validate([
            "name"=>"required",
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
        return redirect()->route('book.index');
    }

    public function destroy($id){
        book::where('id',$id)->Delete();
        return redirect()->route(('book.index'));
    }
}
