<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="/admin/dashboard" class="brand-link">
        <img src="{{ asset('assets/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">SITERU</span>
    </a>
    {{-- {{ env('APP_NAME') }} --}}

    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('storage') . '/' . auth()->user()->image }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="/admin/user-profile" class="d-block">{{ auth()->user()->name }}</a>
            </div>
        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-collapse-hide-child nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ url('/admin/dashboard') }}" class="nav-link {{ Request::is('admin/dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-th"></i>
                        <p>Beranda</p>
                    </a>
                </li>
                @usector
                <li class="nav-item">
                    <a href={{ url("/admin/sectors") }} class="nav-link {{ Request::is("admin/sectors*") ? 'active' : '' }}">
                        <i class="fas fa-building nav-icon"></i>
                        <p>Organisasi</p>
                    </a>
                </li>
                <li class="nav-item {{ Request::is('admin/publication/*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ Request::is('admin/publication/*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-upload"></i>
                        <p>
                            Publikasi
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href={{ url("/admin/publication/news") }} class="nav-link {{ Request::is("admin/publication/news*") ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Berita</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href={{ url("/admin/publication/galleries") }} class="nav-link {{ Request::is("admin/publication/galleries") ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Galeri</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href={{ url("/admin/publication/policies") }} class="nav-link {{ Request::is("admin/publication/policies") ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Kebijakan</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endusector
                {{-- <li class="nav-item">
                    <a href={{ url("/admin/complains") }} class="nav-link {{ Request::is("admin/complains*") ? 'active' : '' }}">
                        <i class="fas fa-mail-bulk nav-icon"></i>
                        <p>Pengaduan</p>
                    </a>
                </li> --}}
                @task_force
                <li class="nav-item">
                    <a href={{ url("/admin/violations") }} class="nav-link {{ Request::is("admin/violations*") ? 'active' : '' }}">
                        <i class="fas fa-envelope-open-text nav-icon"></i>
                        <p>Surat Pelanggaran</p>
                    </a>
                </li>
                @endtask_force
                @uadmin
                <li class="nav-header">Admin</li>
                <li class="nav-item {{ Request::is('admin/master/*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ Request::is('admin/master/*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-server"></i>
                        <p>
                            Master Data
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href={{ url("/admin/master/infrastructure") }} class="nav-link {{ Request::is("admin/master/infrastructure*") ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Infrastruktur</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href={{ url("/admin/master/users") }} class="nav-link {{ Request::is("admin/master/users*") ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Users</p>
                            </a>
                        </li>
                        @admin
                        <li class="nav-item">
                            <a href={{ url("/admin/master/roles") }} class="nav-link {{ Request::is("admin/master/roles") ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Roles</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href={{ url("/admin/master/contacts") }} class="nav-link {{ Request::is("admin/master/contacts") ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Kontak</p>
                            </a>
                        </li>
                        @endadmin
                        <li class="nav-item">
                            <a href={{ url("/admin/master/configs") }} class="nav-link {{ Request::is("admin/master/configs*") ? 'active' : '' }}">
                                <i class="fas fa-cogs nav-icon"></i>
                                <p>Config</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href={{ url("/admin/maps") }} class="nav-link {{ Request::is("admin/maps*") ? 'active' : '' }}">
                        <i class="fas fa-map nav-icon"></i>
                        <p>Peta</p>
                    </a>
                </li>
                @enduadmin
            </ul>
        </nav>
    </div>
</aside>