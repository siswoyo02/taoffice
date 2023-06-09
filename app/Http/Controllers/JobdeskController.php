<?php

namespace App\Http\Controllers;
use App\Models\Jobdesk;
use Illuminate\Support\Facades\Storage;
use App\Models\ActivityLog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class JobdeskController extends Controller
{
    public function index()
    {
        return view('jobdesk.index', [
            'title' => 'Master Jobdesk',
            'data_jobdesk' => Jobdesk::all(),
            'data_alamat' => Jobdesk::all(),
            'data_project' => Jobdesk::all()
        ]);
    }

    public function create()
    {
        return view('jobdesk.create', [
            'title' => 'Tambah Data jobdesk'
        ]);
    }

    public function insert(Request $request)
    {
        $validatedData = $request->validate([
            'nama_jobdesk' => 'required|max:255',
            'alamat' => 'required|max:255',
            'nama_project' => 'required|max:255',
        ]);

        Jobdesk::create($validatedData);
        ActivityLog::create([
            'user_id' => Auth::user()->id,
            'activity' => 'create',
            'description' => 'Menambahkan data Jobdesk ' . $request->nama_jobdesk
        ]);
        return redirect('/jobdesk')->with('success', 'Data Berhasil di Tambahkan');
    }

    public function edit($id)
    {
        return view('jobdesk.edit', [
            'title' => 'Edit Data client',
            'data_jobdesk' => Jobdesk::findOrFail($id),
            'data_alamat' => Jobdesk::findOrFail($id),
            'data_project' => Jobdesk::findOrFail($id)
        ]);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama_jobdesk' => 'required|max:255',
            'alamat' => 'required|max:255',
            'nama_project' => 'required|max:255',
        ]);

        Jobdesk::where('id', $id)->update($validatedData);
        ActivityLog::create([
            'user_id' => Auth::user()->id,
            'activity' => 'create',
            'description' => 'update data client ' . $request->nama_jobdesk
        ]);
        return redirect('/jobdesk')->with('success', 'Data Berhasil di Update');
    }

    public function delete($id)
    {
        $jobdesk = Jobdesk::findOrFail($id);
        $jobdesk->delete();
        Storage::delete($jobdesk->file);
        ActivityLog::create([
            'user_id' => Auth::user()->id,
            'activity' => 'create',
            'description' => 'hapus data jobdesk ' . $jobdesk->nama_jobdesk
        ]);
        return redirect('/jobdesk')->with('success', 'Data Berhasil di Delete');
    }
}
