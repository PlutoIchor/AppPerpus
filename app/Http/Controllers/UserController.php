<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function anggota()
    {
        $anggotas = User::where('role','user')->get();
        return view('admin.anggota', compact('anggotas'));
    }

    public function admin()
    {
        $admins = User::where('role','admin')->get();
        return view('admin.admin', compact('admins'));
    }

    public function updateAdmin(Request $request, $id_admin)
    {
        $admin = User::find($id_admin);
        $nama_admin = $admin->username;
        $admin->update([
            'kode_user' => $request->kode_user,
            'username' => $request->username,
            'fullname' => $request->fullname,
        ]);

        return redirect()->route('admin.admin')->with('successAdd', "Berhasil mengubah data admin '$nama_admin'");
    }

    public function logout(Request $request) {
        Auth::logout();
        return view('auth.login');
      }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createAnggota(Request $request)
    {
        $anggota = User::create([
            'kode_user' => $request->kode_user,
            'nis' => $request->nis,
            'username' => $request->username,
            'fullname' => $request->fullname,
            'kelas' => $request->kelas,
            'password' => Hash::make($request->password),
            'verif' => 'verified',
            'join_date' => now(),
        ]);

        return redirect()->route('admin.anggota')->with('successAdd', "Berhasil menambah anggota '$anggota->username'");
    }

    public function createAdmin(Request $request)
    {
        $admin = User::create([
            'kode_user' => $request->kode_user,
            'username' => $request->username,
            'fullname' => $request->fullname,
            'password' => Hash::make($request->password),
            'verif' => 'verified',
            'role' => 'admin',
            'join_date' => now(),
        ]);

        return redirect()->route('admin.admin')->with('successAdd', "Berhasil menambah admin '$admin->username'");
    }

    public function updateAnggota(Request $request, $id_anggota)
    {
        $anggota = User::find($id_anggota);
        $nama_anggota = $anggota->username;
        $anggota->update([
            'kode_user' => $request->kode_user,
            'nis' => $request->nis,
            'username' => $request->username,
            'fullname' => $request->fullname,
            'kelas' => $request->kelas,
        ]);

        return redirect()->route('admin.anggota')->with('successAdd', "Berhasil mengubah data anggota '$nama_anggota'");
    }

    public function deleteAnggota($id_anggota)
    {
        $anggota = User::find($id_anggota);
        $nama_anggota = $anggota->username;
        $anggota->delete();

        return redirect()->route('admin.anggota')->with('successAdd', "Berhasil menghapus anggota '$nama_anggota'");
    }

    public function deleteAdmin($id_admin)
    {
        $admin = User::find($id_admin);
        $nama_admin = $admin->username;
        $admin->delete();

        return redirect()->route('admin.admin')->with('successAdd', "Berhasil menghapus admin '$nama_admin'");
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
