@extends('layouts.dashboard')
@section('isi')
    <center>
        <div class="container-fluid">
            <div class="card card-outline card-primary col-lg-4">
                <div class="p-4">
                    <form method="post" action="{{ url('/aset/update/'.$data_aset->id) }}">
                        @method('put')
                        @csrf
                            <div class="form-group">
                                <label for="nama_aset" class="float-left">Nama aset</label>
                                <input type="text" class="form-control @error('nama_aset') is-invalid @enderror" id="nama_aset" name="nama_aset" autofocus value="{{ old('nama_aset', $data_aset->nama_aset) }}">
                                @error('nama_aset')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                                <label for="jumlah" class="float-left">jumlah</label>
                                <input type="text" class="form-control @error('jumlah') is-invalid @enderror" id="jumlah" name="jumlah" autofocus value="{{ old('jumlah', $data_jumlah->jumlah) }}">
                                @error('jumlah')
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
