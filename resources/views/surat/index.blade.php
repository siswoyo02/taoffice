@extends('layouts.dashboard')
@section('isi')
    <div class="container-fluid">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <center>
                    <a href="{{ url('/surat/create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Data surat</a>
                </center>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="tableprint" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama surat</th>
                            <th>Alamat</th>
                            <th>Nama Project</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data_surat as $sm)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $sm->nama_surat }}</td>
                                <td>{{ $sm->alamat }}</td>
                                <td>{{ $sm->nama_project }}</td>
                                <td>
                                        <a href="{{ url('/surat/edit/'.$sm->id) }}" class="btn btn-sm btn-warning"><i class="fa fa-solid fa-edit"></i></a>
                                        <form action="{{ url('/surat/delete/'.$sm->id) }}" method="post" class="d-inline">
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
