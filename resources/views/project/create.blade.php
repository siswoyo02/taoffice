@extends('layouts.dashboard')
@section('isi')
    <center>
        <div class="container-fluid">
            <div class="card card-outline card-primary col-lg-4">
                <div class="p-4">
                    <form method="post" action="{{ url('/project/insert') }}">
                        @csrf
                            <div class="form-group">
                                <label for="nama" class="float-left">Nama</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama_client" name="nama" autofocus value="{{ old('nama') }}">
                                @error('nama')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                                <label for="project_manaj" class="float-left">project manajer</label>
                                <input type="text" class="form-control @error('project_manaj') is-invalid @enderror" id="alamat" name="project_manaj" autofocus value="{{ old('project_manaj') }}">
                                @error('project_manaj')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                                <label for="kategori" class="float-left">kategori</label>
                                <input type="text" class="form-control @error('kategori') is-invalid @enderror" id="kategori" name="kategori" autofocus value="{{ old('kategori') }}">
                                @error('kategori')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                                <label for="status" class="float-left">status</label>
                                <input type="text" class="form-control @error('status') is-invalid @enderror" id="status" name="status" autofocus value="{{ old('status') }}">
                                @error('status')
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
