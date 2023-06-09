<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use App\Models\ActivityLog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        return view('project.index', [
            'title' => 'Master project',
            'data_nama' => Project::all(),
            'data_project_manaj' => Project::all(),
            'data_kategori' => Project::all(),
            'data_status' => Project::all()
        ]);
    }

    public function create()
    {
        return view('project.create', [
            'title' => 'Tambah Data project'
        ]);
    }

    public function insert(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'project_manaj' => 'required|max:255',
            'kategori' => 'required|max:255',
            'status' => 'required|max:255',
        ]);

        Project::create($validatedData);
        ActivityLog::create([
            'user_id' => Auth::user()->id,
            'activity' => 'create',
            'description' => 'Menambahkan data client ' . $request->nama_client
        ]);
        return redirect('/project')->with('success', 'Data Berhasil di Tambahkan');
    }

    public function edit($id)
    {
        return view('client.edit', [
            'title' => 'Edit Data project',
            'data_nama' => Project::all(),
            'data_project_manaj' => Project::all(),
            'data_kategori' => Project::all(),
            'data_status' => Project::all()
        ]);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'project_manaj' => 'required|max:255',
            'kategori' => 'required|max:255',
            'status' => 'required|max:255',
        ]);

        Project::where('id', $id)->update($validatedData);
        ActivityLog::create([
            'user_id' => Auth::user()->id,
            'activity' => 'create',
            'description' => 'update data client ' . $request->nama
        ]);
        return redirect('/project')->with('success', 'Data Berhasil di Update');
    }

    public function delete($id)
    {
        $project = Project::findOrFail($id);
        $project->delete();
        Storage::delete($project->file);
        ActivityLog::create([
            'user_id' => Auth::user()->id,
            'activity' => 'create',
            'description' => 'hapus data client ' . $project->nama
        ]);
        return redirect('/client')->with('success', 'Data Berhasil di Delete');
    }
}
