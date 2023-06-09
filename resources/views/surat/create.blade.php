@extends('layouts.dashboard')
@section('isi')
    <center>
        <div class="container-fluid">
            <div class="card card-outline card-primary col-lg-4">
                <div class="p-4">
                    <form method="post" action="{{ url('/surat/insert') }}">
                        @csrf
                            <div class="form-group">
                                <label for="nama_surat" class="float-left">Nama surat</label>
                                <input type="text" class="form-control @error('nama_surat') is-invalid @enderror" id="nama_surat" name="nama_surat" autofocus value="{{ old('nama_surat') }}">
                                @error('nama_surat')
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
