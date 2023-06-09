<aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    @if(auth()->user() == 'admin,user')      
        <a href="{{ url('/dashboard') }}" class="brand-link" style="background-color: #3c86d8;;color: #ffffff;">
    @else
        <a href="{{ url('/dashboard') }}" class="brand-link">
    @endif
        <img src="{{ url('assets/img/tbn.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Tuban Office</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
    <!-- Sidebar user panel -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                @if(auth()->user()->foto_karyawan == null)
                    <img src="{{ url('assets/img/foto_default.jpg') }}" class="img-circle elevation-2" alt="User Image">
                @else
                    <img src="{{ url('storage/'.auth()->user()->foto_karyawan) }}" class="img-circle elevation-2" alt="User Image">
                @endif
            </div>
            <div class="info">
                <a href="/dashboard" class="d-block">{{ auth()->user()->name }}</a>
                <!-- <h3 class="profile-username text-center">{{ auth()->user()->name }}</h3> -->
            </div>
        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-header">GENERAL</li>
                    <li class="nav-item">
                        <a href="{{ url('/dashboard') }}" class="nav-link {{ Request::is('dashboard*') ? 'active' : '' }}">
                            <i class="nav-icon fa fa-solid fa-home biruMuda"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ url('/client') }}" class="nav-link {{ Request::is('client*') ? 'active' : '' }}">
                            <i class="nav-icon fa fa-fw fa-clock biruMuda"></i>
                            <p>
                                Data Client
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="https://fittechinova.com/" class="nav-link {{ Request::is('https://fittechinova.com/') ? 'active' : '' }}">
                            <i class="nav-icon fa fa-database biruMuda"></i>
                            <p>
                                profil Perusahaan
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ url('/aset') }}" class="nav-link {{ Request::is('aset*') ? 'active' : '' }}">
                            <i class="nav-icon fa fa-map-marked-alt biruMuda"></i>
                            <p>
                                Aset Office
                            </p>
                        </a>
                    </li>
            </ul>
        </nav>

        <hr style="background-color:dimgray">

            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-header">MENU UTAMA</li>
                        <li class="nav-item">
                            <a href="{{ url('/surat') }}" class="nav-link {{ Request::is('surat*') ? 'active' : '' }}">
                                <i class="nav-icon fa fa-solid fa-home biruMuda"></i>
                                <p>
                                    Sistem Surat masuk
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ url('/srtkeluar') }}" class="nav-link {{ Request::is('srtkeluar*') ? 'active' : '' }}">
                                <i class="nav-icon fa fa-business-time biruMuda"></i>
                                <p>
                                    Sistem Surat keluar
                                </p>
                            </a>
                        </li>
    
                        <li class="nav-item">
                            <a href="{{ url('/jobdesk') }}" class="nav-link {{ Request::is('jobdesk*') ? 'active' : '' }}">
                                <i class="nav-icon fa fa-fw fa-clock biruMuda"></i>
                                <p>
                                    Sistem Jobdesk
                                </p>
                            </a>
                        </li>
    
                        <li class="nav-item">
                            <a href="{{ url('/project') }}" class="nav-link {{ Request::is('project*') ? 'active' : '' }}">
                                <i class="nav-icon fa fa-database biruMuda"></i>
                                <p>
                                    Sistem Project
                                </p>
                            </a>
                        </li>
                </ul>
            </nav>
    
            <hr style="background-color:dimgray">

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-header">ABSENSI</li>
                <li class="nav-item">
                    <a href="{{ url('/absen') }}" class="nav-link {{ Request::is('absen*') ? 'active' : '' }}">
                        <i class="nav-icon fa fa-stopwatch biruMuda"></i>
                        <p>
                            Absen
                        </p>
                    </a>
                </li>
                @can('admin')
                    <li class="nav-item">
                        <a href="{{ url('/data-absen') }}" class="nav-link {{ Request::is('data-absen*') ? 'active' : '' }}">
                            <i class="nav-icon fa fa-solid fa-table biruMuda"></i>
                            <p>
                                Data Absen
                            </p>
                        </a>
                    </li>
                @endcan
                <li class="nav-item">
                    <a href="{{ url('/my-absen') }}" class="nav-link {{ Request::is('my-absen*') ? 'active' : '' }}">
                        <i class="nav-icon fa fa-user-secret biruMuda"></i>
                        <p>
                            My Absen
                        </p>
                    </a>
                </li>

            </ul>
        </nav>

        <hr style="background-color:dimgray">

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-header">OVERTIME</li>
                <li class="nav-item">
                    <a href="{{ url('/lembur') }}" class="nav-link {{ Request::is('lembur*') ? 'active' : '' }}">
                        <i class="nav-icon fa fa-fw fa-user-clock biruMuda"></i>
                        <p>
                            Lembur
                        </p>
                    </a>
                </li>
                @can('admin')
                    <li class="nav-item">
                        <a href="{{ url('/data-lembur') }}" class="nav-link {{ Request::is('data-lembur*') ? 'active' : '' }}">
                            <i class="nav-icon fa fa-solid fa-table biruMuda"></i>
                            <p>
                                Data Lembur
                            </p>
                        </a>
                    </li>
                @endcan
                <li class="nav-item">
                    <a href="{{ url('/my-lembur') }}" class="nav-link {{ Request::is('my-lembur*') ? 'active' : '' }}">
                        <i class="nav-icon fa fa-business-time biruMuda"></i>
                        <p>
                            My Lembur
                        </p>
                    </a>
                </li>

            </ul>
        </nav>

        <hr style="background-color:dimgray">

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-header">CUTI</li>
                <li class="nav-item">
                    <a href="{{ url('/cuti') }}" class="nav-link {{ Request::is('cuti*') ? 'active' : '' }}">
                        <i class="nav-icon fa fa-hourglass-half biruMuda"></i>
                        <p>
                            Permintaan Cuti
                        </p>
                    </a>
                </li>

                @can('admin')
                    <li class="nav-item">
                        <a href="{{ url('/data-cuti') }}" class="nav-link {{ Request::is('data-cuti*') ? 'active' : '' }}">
                            <i class="nav-icon fa fa-table biruMuda"></i>
                            <p>
                                Data Cuti
                            </p>
                        </a>
                    </li>
                @endcan
            </ul>
        </nav>

        <hr style="background-color:dimgray">

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-header">DOKUMEN</li>

                @can('admin')
                    <li class="nav-item">
                        <a href="{{ url('/dokumen') }}" class="nav-link {{ Request::is('dokumen*') ? 'active' : '' }}">
                            <i class="nav-icon fa fa-folder-open biruMuda"></i>
                            <p>
                                Dokumen Office
                            </p>
                        </a>
                    </li>
                @endcan
                
                <li class="nav-item">
                    <a href="{{ url('/my-dokumen') }}" class="nav-link {{ Request::is('my-dokumen*') ? 'active' : '' }}">
                        <i class="nav-icon fa fa-folder biruMuda"></i>
                        <p>
                            Dokumen Pegawai
                        </p>
                    </a>
                </li>
                

            </ul>
        </nav>

        <hr style="background-color:dimgray">

        @can('admin')
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-header">MENU ADMIN</li>
                    <li class="nav-item">
                        <a href="{{ url('/karyawan') }}" class="nav-link {{ Request::is('karyawan*') ? 'active' : '' }}">
                            <i class="nav-icon fa fa-solid fa-user biruMuda"></i>
                            <p>
                                User Staff
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ url('/shift') }}" class="nav-link {{ Request::is('shift*') ? 'active' : '' }}">
                            <i class="nav-icon fa fa-fw fa-clock biruMuda"></i>
                            <p>
                                Sistem Shift
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ url('/rekap-data') }}" class="nav-link {{ Request::is('rekap-data*') ? 'active' : '' }}">
                            <i class="nav-icon fa fa-database biruMuda"></i>
                            <p>
                                Rekap Data Absensi
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ url('/lokasi-kantor') }}" class="nav-link {{ Request::is('lokasi-kantor*') ? 'active' : '' }}">
                            <i class="nav-icon fa fa-map-marked-alt biruMuda"></i>
                            <p>
                                Lokasi Utama
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ url('/reset-cuti') }}" class="nav-link {{ Request::is('reset-cuti*') ? 'active' : '' }}">
                            <i class="nav-icon fa fa-sync-alt biruMuda"></i>
                            <p>
                                Reset Cuti
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ url('/jabatan') }}" class="nav-link {{ Request::is('jabatan*') ? 'active' : '' }}">
                            <i class="nav-icon fa fa-universal-access biruMuda"></i>
                            <p>
                                Manajemen Jabatan
                            </p>
                        </a>
                    </li>
            </ul>
        </nav>

        <hr style="background-color:dimgray">
        @endcan

        @can('admin')
        <!-- Activity Logs -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a class="nav-link" href="/activity-logs">
                        <i class="nav-icon fas fa-history biruMuda"></i>
                        <p>
                            Activity Logs
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        @endcan

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
                        <i class="nav-icon fas fa-sign-out-alt merah"></i>
                        <p>
                            Log Out
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
    <!-- /.sidebar -->
</aside>
<style>
    .merah {
        color: red;
    }
    .hijau {
        color: green;
    }
    .biru {
        color: blue;
    }
    .kuning {
        color: yellow;
    }
    .ungu {
        color: purple;
    }
    .abu {
        color: gray;
    }
    .hitam {
        color: black;
    }
    .putih {
        color: white;
    }
    .biruMuda {
        color: #00bfff;
    }
    .biruTua {
        color: #0000ff;
    }
    .hijauMuda {
        color: #00ff00;
    }
    .hijauTua {
        color: #008000;
    }
    .kuningMuda {
        color: #ffff00;
    }
    .kuningTua {
        color: #ffbf00;
    }
    .unguMuda {
        color: #ff00ff;
    }
    .unguTua {
        color: #800080;
    }
    .abuMuda {
        color: #c0c0c0;
    }
    .abuTua {
        color: #808080;
    }
    .hitamMuda {
        color: #000000;
    }
    .hitamTua {
        color: #000000;
    }
    .putihMuda {
        color: #ffffff;
    }
    .putihTua {
        color: #ffffff;
    }

</style>
