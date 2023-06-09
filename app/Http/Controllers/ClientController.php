<?php

namespace App\Http\Controllers;

use App\Helpers\Encryption;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use App\Models\ActivityLog;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    public function index()
    {
        $dataArray = Client::all();
        for ($i = 0; $i < count($dataArray); $i++) {
            $classAES = new Encryption();
            $decryptedString = $classAES->decrypt($dataArray[$i]['data_client'], config('secretKey.secretKey'));

            unset($dataArray[$i]['data_client']);

            $dataArray[$i]['nama_client'] = json_decode($decryptedString)->nama_client;
            $dataArray[$i]['alamat'] = json_decode($decryptedString)->alamat;
            $dataArray[$i]['nama_project'] = json_decode($decryptedString)->nama_project;

            // dd($dataArray[$i]);
        }
        return view('client.index', [
            'title' => 'Master client',
            'data_client' => $dataArray,
            // 'data_client' => Client::all(),
            // 'data_alamat' => Client::all(),
            // 'data_project' => Client::all()
        ]);
    }

    public function create()
    {
        return view('client.create', [
            'title' => 'Tambah Data client'
        ]);
    }

    public function insert(Request $request)
    {
        $validatedData = $request->validate([
            'nama_client' => 'required|max:255',
            'alamat' => 'required|max:255',
            'nama_project' => 'required|max:255',
        ]);

        $data = [
            'nama_client' => $request->nama_client,
            'alamat' => $request->alamat,
            'nama_project' => $request->nama_project,
        ];

        $dataString = json_encode($data); //objek $data jadi string

        $classAES = new Encryption();
        $encryptedString = $classAES->encrypt($dataString, config('secretKey.secretKey'));

        $client = new Client;
        $client->data_client = $encryptedString;
        $client->save();

        // Client::create($validatedData); //setor data
        ActivityLog::create([
            'user_id' => Auth::user()->id,
            'activity' => 'create',
            'description' => 'Menambahkan data client ' . $request->nama_client
        ]);
        return redirect('/client')->with('success', 'Data Berhasil di Tambahkan');
    }

    public function edit($id)
    {
        $data = Client::where('id', '=', $id)->get();
        $classAES = new Encryption();
        $decryptedString = $classAES->decrypt($data[0]['data_client'], config('secretKey.secretKey'));
        $decryptedData = json_decode($decryptedString);

        unset($data[0]['data_client']);

        $data[0]['nama_client'] = json_decode($decryptedString)->nama_client;
        $data[0]['alamat'] = json_decode($decryptedString)->alamat;
        $data[0]['nama_project'] = json_decode($decryptedString)->nama_project;

        // dd($data[0]['id']);
        return view('client.edit', [
            'title' => 'Edit Data client',
            'data' => $data[0],
        ]);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama_client' => 'required|max:255',
            'alamat' => 'required|max:255',
            'nama_project' => 'required|max:255',
        ]);

        $data = [
            'nama_client' => $request->nama_client,
            'alamat' => $request->alamat,
            'nama_project' => $request->nama_project,
        ];

        $dataString = json_encode($data); //objek $data jadi string

        $classAES = new Encryption();
        $encryptedString = $classAES->encrypt($dataString, config('secretKey.secretKey'));

        $client = Client::find($id);
        $client->data_client = $encryptedString;
        $client->save();

        ActivityLog::create([
            'user_id' => Auth::user()->id,
            'activity' => 'create',
            'description' => 'update data client ' . $request->nama_client
        ]);
        return redirect('/client')->with('success', 'Data Berhasil di Update');
    }

    public function delete($id)
    {
        $client = Client::findOrFail($id);
        $client->delete();
        Storage::delete($client->file);
        ActivityLog::create([
            'user_id' => Auth::user()->id,
            'activity' => 'create',
            'description' => 'hapus data client ' . $client->nama_client
        ]);
        return redirect('/client')->with('success', 'Data Berhasil di Delete');
    }
}