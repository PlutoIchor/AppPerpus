<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Penerbit;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function viewBuku()
    {
        $bukus = Buku::paginate(5)->withQueryString();
        $kategoris = Kategori::get();
        $penerbits = Penerbit::get();
        return view('admin.buku', compact('bukus', 'penerbits', 'kategoris'));
    }

    public function searchBuku(Request $request)
    {
        $bukus = Buku::where('judul_buku', 'like', "%" . $request->search . "%")
            ->orWhere('pengarang', 'like', "%" . $request->search . "%")
            ->paginate(5)->withQueryString();
        $kategoris = Kategori::get();
        $penerbits = Penerbit::get();
        return view('admin.buku', compact('bukus', 'penerbits', 'kategoris'));
    }

    public function createBuku(Request $request)
    {
        $imageName = time() . '.' . $request->foto->extension();
        $request->foto->move(public_path('img'), $imageName);

        $buku = Buku::create([
            'judul_buku' => $request->judul_buku,
            'pengarang' => $request->pengarang,
            'id_kategori' => $request->id_kategori,
            'id_penerbit' => $request->id_penerbit,
            'j_buku_baik' => $request->j_buku_baik,
            'j_buku_rusak' => $request->j_buku_rusak,
            'tahun_terbit' => $request->tahun_terbit,
            'foto' => $imageName,
        ]);
        return redirect()->back()->with('successAdd', "Berhasil menambah buku '$buku->judul_buku'");
    }

    public function updateBuku(Request $request, $id_buku)
    {
        $buku = Buku::find($id_buku);
        $nama_buku = $buku->judul_buku;
        $imageName = time() . '.' . $request->foto->extension();
        $request->foto->move(public_path('img'), $imageName);

        $buku = Buku::create([
            'judul_buku' => $request->judul_buku,
            'pengarang' => $request->pengarang,
            'id_kategori' => $request->id_kategori,
            'id_penerbit' => $request->id_penerbit,
            'j_buku_baik' => $request->j_buku_baik,
            'j_buku_rusak' => $request->j_buku_rusak,
            'tahun_terbit' => $request->tahun_terbit,
            'foto' => $imageName,
        ]);
        return redirect()->back()->with('successAdd', "Berhasil mengubah buku '$nama_buku'");
    }

    public function deleteBuku($id_buku)
    {
        $buku = Buku::find($id_buku);
        $nama_buku = $buku->judul_buku;
        $buku->delete();
        return redirect()->back()->with('successAdd', "Berhasil menghapus buku '$nama_buku'");
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function show(Buku $buku)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function edit(Buku $buku)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Buku $buku)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function destroy(Buku $buku)
    {
        //
    }
}
