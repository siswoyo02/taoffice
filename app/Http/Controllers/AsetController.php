<?php

namespace App\Http\Controllers;
use App\Models\Aset;
use Illuminate\Support\Facades\Storage;
use App\Models\ActivityLog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AsetController extends Controller
{
    public function index()
    {
        return view('aset.index', [
            'title' => 'Master aset',
            'data_aset' => Aset::all(),
            'data_jumlah' => Aset::all()
        ]);
    }

    public function create()
    {
        return view('aset.create', [
            'title' => 'Tambah Data aset'
        ]);
    }

    public function insert(Request $request)
    {
        $validatedData = $request->validate([
            'nama_aset' => 'required|max:255',
            'jumlah' => 'required|max:255',
        ]);

        Aset::updateOrcreate($validatedData);
        ActivityLog::create([
            'user_id' => Auth::user()->id,
            'activity' => 'create',
            'description' => 'Menambahkan data client ' . $request->nama_aset
        ]);
        return redirect('/aset')->with('success', 'Data Berhasil di Tambahkan');
    }

    public function edit($id)
    {
        return view('aset.edit', [
            'title' => 'Edit Data aset',
            'data_aset' => Aset::findOrFail($id),
            'data_jumlah' => Aset::findOrFail($id)
        ]);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama_aset' => 'required|max:255',
            'jumlah' => 'required|max:255',
        ]);

        Aset::where('id', $id)->update($validatedData);
        ActivityLog::create([
            'user_id' => Auth::user()->id,
            'activity' => 'create',
            'description' => 'update data client ' . $request->nama_aset
        ]);
        return redirect('/aset')->with('success', 'Data Berhasil di Update');
    }

    public function delete($id)
    {
        $aset = Aset::findOrFail($id);
        $aset->delete();
        Storage::delete($aset->file);
        ActivityLog::create([
            'user_id' => Auth::user()->id,
            'activity' => 'create',
            'description' => 'update data client ' . $aset->nama_aset
        ]);
        return redirect('/aset')->with('success', 'Data Berhasil di Delete');
    }
}
