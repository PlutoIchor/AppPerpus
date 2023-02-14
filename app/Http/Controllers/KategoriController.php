<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function viewKategori()
    {
        $kategoris = Kategori::paginate(5)->withQueryString();
        return view('admin.kategori', compact('kategoris'));
    }

    public function searchKategori(Request $request)
    {
        $kategoris = Kategori::where('kode_kategori', 'like', "%" . $request->search . "%")
            ->orWhere('nama_kategori', 'like', "%" . $request->search . "%")
            ->paginate(5)->withQueryString();
        return view('admin.kategori', compact('kategoris'));
    }

    public function createKategori(Request $request)
    {
        $kategori = Kategori::create($request->all());
        return redirect()->route('admin.kategori')->with('successAdd', "Berhasil membuat kategori '$kategori->nama_kategori'");
    }

    public function updateKategori(Request $request, $id_kategori)
    {
        $kategori = Kategori::find($id_kategori);
        $nama_kategori = $kategori->nama_kategori;
        $kategori->update($request->all());
        return redirect()->route('admin.kategori')->with('successAdd', "Berhasil mengubah kategori '$nama_kategori'");
    }

    public function deleteKategori($id_kategori)
    {
        $kategori = Kategori::find($id_kategori);
        $nama_kategori = $kategori->nama_kategori;
        $kategori->delete();
        return redirect()->route('admin.kategori')->with('successAdd', "Berhasil menghapus kategori '$nama_kategori'");
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
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function show(Kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function edit(Kategori $kategori)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kategori $kategori)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kategori $kategori)
    {
        //
    }
}
