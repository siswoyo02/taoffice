<?php

namespace App\Http\Controllers;
use App\Mail\Email;
use App\Models\Surat;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use App\Models\ActivityLog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class SuratController extends Controller
{
    public function index()
    {
        return view('surat.index', [
            'title' => 'Master surat',
            'data_surat' => Surat::all(),
            'data_alamat' => Surat::all(),
            'data_project' => Surat::all()
        ]);
    }

    public function create()
    {
        return view('surat.create', [
            'title' => 'Tambah Data surat'
        ]);
    }

    public function insert(Request $request)
    {
        $validatedData = $request->validate([
            'nama_surat' => 'required|max:255',
            'alamat' => 'required|max:255',
            'nama_project' => 'required|max:255',
        ]);

        Surat::create($validatedData);
        ActivityLog::create([
            'user_id' => Auth::user()->id,
            'activity' => 'create',
            'description' => 'Menambahkan data surat ' . $request->nama_surat
        ]);
        return redirect('/surat')->with('success', 'Data Berhasil di Tambahkan');
    }

    public function edit($id)
    {
        return view('surat.edit', [
            'title' => 'Edit Data surat',
            'data_surat' => Surat::findOrFail($id),
            'data_alamat' => Surat::findOrFail($id),
            'data_project' => Surat::findOrFail($id)
        ]);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama_surat' => 'required|max:255',
            'alamat' => 'required|max:255',
            'nama_project' => 'required|max:255',
        ]);

        Surat::where('id', $id)->update($validatedData);
        ActivityLog::create([
            'user_id' => Auth::user()->id,
            'activity' => 'create',
            'description' => 'update data surat ' . $request->nama_surat
        ]);
        return redirect('/surat')->with('success', 'Data Berhasil di Update');
    }

    public function delete($id)
    {
        $surat = Surat::findOrFail($id);
        $surat->delete();
        Storage::delete($surat->file);
        ActivityLog::create([
            'user_id' => Auth::user()->id,
            'activity' => 'create',
            'description' => 'hapus data surat ' . $surat->nama_surat
        ]);
        return redirect('/surat')->with('success', 'Data Berhasil di Delete');
    }
}
