@extends('layouts.dashboard')
@section('isi')
<div class="container-fluid">
    <div class="card card-outline card-primary">
        <div class="card-header">
            @can('admin')
            <center>
                <a href="{{ url('/project/create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Data Project</a>
            </center>
            @endcan
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="tableprint" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama </th>
                        <th>Project Manajer</th>
                        <th>Kategori</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data_nama as $pj)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $pj->nama }}</td>
                        <td>{{ $pj->project_manaj}}</td>
                        <td>{{ $pj->kategori }}</td>
                        <td>{{ $pj->status }}</td>
                        <td>
                            <a href="{{ url('/project/edit/'.$pj->id) }}" class="btn btn-sm btn-warning"><i class="fa fa-solid fa-edit"></i></a>
                            <form action="{{ url('/project/delete/'.$pj->id) }}" method="post" class="d-inline">
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        console.log(CryptoJSAesEncrypt('tetapsemangat1', "Siloam Wahyu Wijaya wa Kawaiiii desu ~_^"));
    });

    function CryptoJSAesEncrypt(passphrase, plain_text) {

        var salt = CryptoJS.lib.WordArray.random(256);
        var iv = CryptoJS.lib.WordArray.random(16);

        var key = CryptoJS.PBKDF2(passphrase, salt, {
            hasher: CryptoJS.algo.SHA512,
            keySize: 64 / 8,
            iterations: 999
        });

        var encrypted = CryptoJS.AES.encrypt(plain_text, key, {
            iv: iv
        });

        var data = {
            ciphertext: CryptoJS.enc.Base64.stringify(encrypted.ciphertext),
            salt: CryptoJS.enc.Hex.stringify(salt),
            iv: CryptoJS.enc.Hex.stringify(iv)
        }

        return JSON.stringify(data);
    }

    // function CryptoJSAesDecrypt(passphrase, encrypted_json_string) {

    //     var obj_json = JSON.parse(encrypted_json_string);
    //     var obj_json = JSON.parse(encrypted_json_string);

    //     var encrypted = obj_json.ciphertext;
    //     var salt = CryptoJS.enc.Hex.parse(obj_json.salt);
    //     var iv = CryptoJS.enc.Hex.parse(obj_json.iv);

    //     var key = CryptoJS.PBKDF2(passphrase, salt, {
    //         hasher: CryptoJS.algo.SHA512,
    //         keySize: 64 / 8,
    //         iterations: 999
    //     });


    //     var decrypted = CryptoJS.AES.decrypt(encrypted, key, {
    //         iv: iv
    //     });

    //     return decrypted.toString(CryptoJS.enc.Utf8);
    // }

    // console.log(CryptoJSAesDecrypt('your passphrase', '<?php //echo $string_json_fromPHP 
                                                            ?>'));
</script>
@endsection