<?php

namespace App\Http\Controllers;

use App\Models\Identitas;
use App\Models\Peminjaman;
use App\Models\User;
use Illuminate\Http\Request;
use App\Exports\AnggotaExport;
use App\Exports\ExcelExport;
use App\Exports\PeminjamanExport;
use App\Exports\PengembalianExport;
use Maatwebsite\Excel\Facades\Excel;

use PDF;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function peminjaman(Request $request)
    {
        $peminjamans = Peminjaman::where('tanggal_peminjaman', '>=', $request->tanggal_awal)->where('tanggal_peminjaman', '<=', $request->tanggal_akhir)->get();
        $identitas = Identitas::first();

        if ($_POST['action'] == 'pdf') {
            $data = [
                'peminjamans' => $peminjamans,
                'identitas' => $identitas,
                'from' => $request->tanggal_awal,
                'to' => $request->tanggal_akhir,
            ];

            $pdf = PDF::loadView('pdf.peminjaman', $data);

            return $pdf->stream('peminjaman.pdf');
        } else if ($_POST['action'] == 'excel') {
            return Excel::download(new PeminjamanExport($request->tanggal_awal, $request->tanggal_akhir, $identitas), 'peminjaman.xlsx');
        } else {
            //invalid action!
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function pengembalian(Request $request)
    {
        $pengembalians = Peminjaman::where('tanggal_pengembalian', '>=', $request->tanggal_awal)->where('tanggal_peminjaman', '<=', $request->tanggal_akhir)->get();
        $identitas = Identitas::first();

        if ($_POST['action'] == 'pdf') {
            $data = [
                'pengembalians' => $pengembalians,
                'identitas' => $identitas,
                'from' => $request->tanggal_awal,
                'to' => $request->tanggal_akhir,
            ];

            $pdf = PDF::loadView('pdf.pengembalian', $data);

            return $pdf->stream('pengembalian.pdf');
        } else if ($_POST['action'] == 'excel') {
            return Excel::download(new PengembalianExport($request->tanggal_awal, $request->tanggal_akhir, $identitas), 'pengembalian.xlsx');
        } else {
            //invalid action!
        }
    }

    public function anggota(Request $request)
    {
        $anggotas = User::where("$request->kolom", 'like', "%" . $request->data . "%")->where('role', 'user')->get();
        $identitas = Identitas::first();
        if ($_POST['action'] == 'pdf') {
            $data = [
                'anggotas' => $anggotas,
                'identitas' => $identitas,
                'kolom' => $request->kolom,
                'keyword' => $request->data,
            ];

            $pdf = PDF::loadView('pdf.anggota', $data);

            return $pdf->stream('anggota.pdf');
        } else if ($_POST['action'] == 'excel') {
            return Excel::download(new AnggotaExport($request->kolom, $request->data, $identitas), 'pengembalian.xlsx');
        } else {
            //invalid action!
        }
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
