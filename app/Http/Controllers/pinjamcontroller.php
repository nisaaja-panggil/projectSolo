<?php

namespace App\Http\Controllers;

use App\Models\pinjam_buku;
use App\Models\book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use illuminate\Http\RedirectResponse;

class pinjamcontroller extends Controller
{
    public function index()
{
    $data = pinjam_buku::with(['admin', 'anggota', 'book'])->get();

    return view('pinjam.table', [
        "title" => "pinjam",
        "data" => $data
    ]);
}

    public function create(){
        return view('pinjam.index')->with(["title"=>"tambah pinjam buku"]);   
    }

    public function store(Request $request)
{
    $adminId = Auth::id();

    $validasi = $request->validate([
        'anggota_id' => 'required',
        'book_id' => 'required',
        'tanggal_pinjam' => 'required|date',
        'tanggal_kembali' => 'required|date',
        'status' => 'required'
    ]);

    $validasi['admin_id'] = $adminId;

    pinjam_buku::create($validasi);

    $book = book::find($request->book_id);
    if ($book) {
        $book->status = 'pinjam';
        $book->save();
    }

    return redirect()->route('book.index');
}

public function edit($id): View
{
    $pinjam_buku = pinjam_buku::findOrFail($id);
    
    return view('pinjam.edit', [
        'pinjam_buku' => $pinjam_buku,
        'title' => 'Ubah Data Pinjam'
    ]);
}

public function update(Request $request, $id): RedirectResponse
{
    $request->validate([
        'status' => 'required'
    ]);

    $pinjam_buku = pinjam_buku::findOrFail($id);
    $pinjam_buku->update($request->only('status'));

    $book = Book::findOrFail($pinjam_buku->book_id);
    $book->status = $request->status;
    $book->save();

    return redirect()->route('pinjam.index')->with('updated', 'Data buku berhasil diubah');
}


}
