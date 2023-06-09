@extends('layouts.dashboard')
@section('isi')
    <div class="container-fluid">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <center>
                    <a href="{{ url('/aset/create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Data aset</a>
                </center>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="tableprint" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama aset</th>
                            <th>Jumlah</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data_aset as $ast)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $ast->nama_aset }}</td>
                                <td>{{ $ast->jumlah }}</td>
                                <td>
                                        <a href="{{ url('/aset/edit/'.$ast->id) }}" class="btn btn-sm btn-warning"><i class="fa fa-solid fa-edit"></i></a>
                                        <form action="{{ url('/aset/delete/'.$ast->id) }}" method="post" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button class="btn btn-danger btn-sm btn-circle" onClick="return confirm('Are You Sure')"><i class="fa fa-solid fa-trash"></i></button>
                                        </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
    <br>
@endsection
