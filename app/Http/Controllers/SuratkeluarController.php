<?php

namespace App\Http\Controllers;
use App\Models\Suratkeluar;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use App\Models\ActivityLog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class SuratkeluarController extends Controller
{
    public function index()
    {
        return view('srtkeluar.index', [
            'title' => 'Master surat keluar',
            'data_suratkeluar' => Suratkeluar::all(),
            'data_alamat' => Suratkeluar::all(),
            'data_project' => Suratkeluar::all()
        ]);
    }

    public function create()
    {
        return view('srtkeluar.create', [
            'title' => 'Tambah Data suratkeluar'
        ]);
    }

    public function insert(Request $request)
    {
        $validatedData = $request->validate([
            'nama_suratkeluar' => 'required|max:255',
            'alamat' => 'required|max:255',
            'nama_project' => 'required|max:255',
        ]);

        Suratkeluar::create($validatedData);
        ActivityLog::create([
            'user_id' => Auth::user()->id,
            'activity' => 'create',
            'description' => 'Menambahkan data suratkeluar ' . $request->nama_suratkeluar
        ]);
        return redirect('/srttkeluar')->with('success', 'Data Berhasil di Tambahkan');
    }

    public function edit($id)
    {
        return view('srtkeluar.edit', [
            'title' => 'Edit Data suratkeluar',
            'data_suratkeluar' => Suratkeluar::findOrFail($id),
            'data_alamat' => Suratkeluar::findOrFail($id),
            'data_project' => Suratkeluar::findOrFail($id)
        ]);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama_suratkeluar' => 'required|max:255',
            'alamat' => 'required|max:255',
            'nama_project' => 'required|max:255',
        ]);

        Suratkeluar::where('id', $id)->update($validatedData);
        ActivityLog::create([
            'user_id' => Auth::user()->id,
            'activity' => 'create',
            'description' => 'update data suratkeluar ' . $request->nama_suratkeluar
        ]);
        return redirect('/srtkeluar')->with('success', 'Data Berhasil di Update');
    }

    public function delete($id)
    {
        $suratkeluar = Suratkeluar::findOrFail($id);
        $suratkeluar->delete();
        Storage::delete($suratkeluar->file);
        ActivityLog::create([
            'user_id' => Auth::user()->id,
            'activity' => 'create',
            'description' => 'hapus data suratkeluar ' . $suratkeluar->nama_suratkeluar
        ]);
        return redirect('/srtkeluar')->with('success', 'Data Berhasil di Delete');
    }
}
