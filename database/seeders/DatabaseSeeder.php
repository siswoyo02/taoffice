<?php

namespace Database\Seeders;

use App\Models\Jabatan;
use App\Models\Lokasi;
use App\Models\ResetCuti;
use App\Models\User;
use App\Models\Shift;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        User::create([
            'name' => 'Admin',
            'foto_karyawan' => '',
            'email' => 'admin@gmail.com',
            'telepon' => '0895419655533',
            'username' => 'admin',
            'password' => Hash::make('admin123'),
            'tgl_lahir' => date('Y-m-d'),
            'gender' => 'Laki-Laki',
            'tgl_join' => date('Y-m-d'),
            'status_nikah' => 'Lajang',
            'alamat' => 'Tuban',
            'cuti_dadakan' => '1',
            'cuti_bersama' => '1',
            'cuti_menikah' => '2',
            'cuti_diluar_tanggungan' => '2',
            'cuti_khusus' => '3',
            'cuti_melahirkan' => '0',
            'izin_telat' => '5',
            'izin_pulang_cepat' => '3',
            'is_admin' => 'admin',
            'jabatan_id' => '1'
        ]);

        User::create([
            'name' => 'User',
            'foto_karyawan' => '',
            'email' => 'user@gmail.com',
            'telepon' => '081999275492',
            'username' => 'user',
            'password' => Hash::make('user123'),
            'tgl_lahir' => date('Y-m-d'),
            'gender' => 'Laki-Laki',
            'tgl_join' => '2022-01-28',
            'status_nikah' => 'Menikah',
            'alamat' => 'alamat user',
            'cuti_dadakan' => '1',
            'cuti_bersama' => '5',
            'cuti_menikah' => '2',
            'cuti_diluar_tanggungan' => '1',
            'cuti_khusus' => '8',
            'cuti_melahirkan' => '6',
            'izin_telat' => '1',
            'izin_pulang_cepat' => '9',
            'is_admin' => 'user',
            'jabatan_id' => '2'
        ]);

        Jabatan::create([
            'nama_jabatan' => 'Direktur'
        ]);

        Jabatan::create([
            'nama_jabatan' => 'Manager'
        ]);

        Jabatan::create([
            'nama_jabatan' => 'Programer'
        ]);

        Jabatan::create([
            'nama_jabatan' => 'Staff'
        ]);

        Jabatan::create([
            'nama_jabatan' => 'Admin'
        ]);

        Shift::create([
            'nama_shift' => "Libur",
            'jam_masuk' => "00:00",
            'jam_keluar' => "00:00",
        ]);

        Shift::create([
            'nama_shift' => "Office",
            'jam_masuk' => "08:00",
            'jam_keluar' => "17:00",
        ]);

        Shift::create([
            'nama_shift' => "Siang",
            'jam_masuk' => "13:00",
            'jam_keluar' => "21:00",
        ]);

        Shift::create([
            'nama_shift' => "Malam",
            'jam_masuk' => "21:00",
            'jam_keluar' => "07:00",
        ]);

        Lokasi::create([
            'lat_kantor' => '-6.898837',
            'long_kantor' => '112.046379',
            'radius' => '200',
        ]);

        ResetCuti::create([
            'cuti_dadakan' => 3,
            'cuti_bersama' => 3,
            'cuti_menikah' => 5,
            'cuti_diluar_tanggungan' => 3,
            'cuti_khusus' => 3,
            'cuti_melahirkan' => 3,
            'izin_telat' => 3, 
            'izin_pulang_cepat' => 3
        ]);
    }
}

