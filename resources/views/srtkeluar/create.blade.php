@extends('layouts.dashboard')
@section('isi')
    <center>
        <div class="container-fluid">
            <div class="card card-outline card-primary col-lg-4">
                <div class="p-4">
                    <form method="post" action="{{ url('/srtkeluar/insert') }}">
                        @csrf
                            <div class="form-group">
                                <label for="nama_suratkeluar" class="float-left">Nama suratkeluar</label>
                                <input type="text" class="form-control @error('nama_suratkeluar') is-invalid @enderror" id="nama_suratkeluar" name="nama_suratkeluar" autofocus value="{{ old('nama_suratkeluar') }}">
                                @error('nama_suratkeluar')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                                <label for="alamat" class="float-left">Alamat</label>
                                <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" autofocus value="{{ old('alamat') }}">
                                @error('alamat')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                                <label for="nama_project" class="float-left">Nama Project</label>
                                <input type="text" class="form-control @error('nama_project') is-invalid @enderror" id="nama_project" name="nama_project" autofocus value="{{ old('nama_project') }}">
                                @error('nama_project')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        <button type="submit" class="btn btn-primary float-right">Submit</button>
                      </form>
                      <br>
                </div>
            </div>
        </div>
    </center>
    <br>
@endsection
