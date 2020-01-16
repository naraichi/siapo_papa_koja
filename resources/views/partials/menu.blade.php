<aside class="main-sidebar sidebar-dark-primary elevation-4" style="min-height: 917px;">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <span class="brand-text font-weight-light">{{ trans('panel.site_title') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route("admin.home") }}" class="nav-link">
                        <p>
                            <i class="fas fa-fw fa-tachometer-alt">

                            </i>
                            <span>{{ trans('global.dashboard') }}</span>
                        </p>
                    </a>
                </li>
                @can('management_pengguna_access')
                    <li class="nav-item has-treeview {{ request()->is('admin/permissions*') ? 'menu-open' : '' }} {{ request()->is('admin/roles*') ? 'menu-open' : '' }} {{ request()->is('admin/users*') ? 'menu-open' : '' }} {{ request()->is('admin/skpds*') ? 'menu-open' : '' }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw fas fa-users">

                            </i>
                            <p>
                                <span>{{ trans('cruds.managementPengguna.title') }}</span>
                                <i class="right fa fa-fw fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('permission_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.permissions.index") }}" class="nav-link {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-unlock-alt">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.permission.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('role_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.roles.index") }}" class="nav-link {{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-cogs">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.role.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('user_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.users.index") }}" class="nav-link {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-user">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.user.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('skpd_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.skpds.index") }}" class="nav-link {{ request()->is('admin/skpds') || request()->is('admin/skpds/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-briefcase">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.skpd.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('data_master_proposal_access')
                    <li class="nav-item has-treeview {{ request()->is('admin/kategoris*') ? 'menu-open' : '' }} {{ request()->is('admin/indikator-formulir-proposals*') ? 'menu-open' : '' }} {{ request()->is('admin/indikator-proposal-inovasis*') ? 'menu-open' : '' }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw fas fa-book">

                            </i>
                            <p>
                                <span>{{ trans('cruds.dataMasterProposal.title') }}</span>
                                <i class="right fa fa-fw fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('kategori_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.kategoris.index") }}" class="nav-link {{ request()->is('admin/kategoris') || request()->is('admin/kategoris/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-boxes">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.kategori.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('indikator_formulir_proposal_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.indikator-formulir-proposals.index") }}" class="nav-link {{ request()->is('admin/indikator-formulir-proposals') || request()->is('admin/indikator-formulir-proposals/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-tasks">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.indikatorFormulirProposal.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('indikator_proposal_inovasi_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.indikator-proposal-inovasis.index") }}" class="nav-link {{ request()->is('admin/indikator-proposal-inovasis') || request()->is('admin/indikator-proposal-inovasis/*') ? 'active' : '' }}">
                                        <i class="fa-fw far fa-file">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.indikatorProposalInovasi.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('pengaturan_halaman_access')
                    <li class="nav-item has-treeview {{ request()->is('admin/dasar-hukums*') ? 'menu-open' : '' }} {{ request()->is('admin/pengumumen*') ? 'menu-open' : '' }} {{ request()->is('admin/unduhans*') ? 'menu-open' : '' }} {{ request()->is('admin/kontaks*') ? 'menu-open' : '' }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw fas fa-cogs">

                            </i>
                            <p>
                                <span>{{ trans('cruds.pengaturanHalaman.title') }}</span>
                                <i class="right fa fa-fw fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('dasar_hukum_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.dasar-hukums.index") }}" class="nav-link {{ request()->is('admin/dasar-hukums') || request()->is('admin/dasar-hukums/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-balance-scale">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.dasarHukum.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('pengumuman_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.pengumumen.index") }}" class="nav-link {{ request()->is('admin/pengumumen') || request()->is('admin/pengumumen/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-bullhorn">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.pengumuman.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('unduhan_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.unduhans.index") }}" class="nav-link {{ request()->is('admin/unduhans') || request()->is('admin/unduhans/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-download">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.unduhan.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('kontak_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.kontaks.index") }}" class="nav-link {{ request()->is('admin/kontaks') || request()->is('admin/kontaks/*') ? 'active' : '' }}">
                                        <i class="fa-fw far fa-user-circle">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.kontak.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('event_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.events.index") }}" class="nav-link {{ request()->is('admin/events') || request()->is('admin/events/*') ? 'active' : '' }}">
                            <i class="fa-fw far fa-calendar-alt">

                            </i>
                            <p>
                                <span>{{ trans('cruds.event.title') }}</span>
                            </p>
                        </a>
                    </li>
                @endcan
                @can('prposal_inovasi_access')
                    <li class="nav-item has-treeview {{ request()->is('admin/pengajuans*') ? 'menu-open' : '' }} {{ request()->is('admin/tidak-memenuhis*') ? 'menu-open' : '' }} {{ request()->is('admin/memenuhis*') ? 'menu-open' : '' }} {{ request()->is('admin/nominasis*') ? 'menu-open' : '' }} {{ request()->is('admin/rekapitulasis*') ? 'menu-open' : '' }}">
                        <a class="nav-link nav-dropdown-toggle" href="#">
                            <i class="fa-fw far fa-file-alt">

                            </i>
                            <p>
                                <span>{{ trans('cruds.prposalInovasi.title') }}</span>
                                <i class="right fa fa-fw fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('pengajuan_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.pengajuans.index") }}" class="nav-link {{ request()->is('admin/pengajuans') || request()->is('admin/pengajuans/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-external-link-square-alt">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.pengajuan.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('tidak_memenuhi_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.tidak-memenuhis.index") }}" class="nav-link {{ request()->is('admin/tidak-memenuhis') || request()->is('admin/tidak-memenuhis/*') ? 'active' : '' }}">
                                        <i class="fa-fw far fa-file-excel">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.tidakMemenuhi.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('memenuhi_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.memenuhis.index") }}" class="nav-link {{ request()->is('admin/memenuhis') || request()->is('admin/memenuhis/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-check-circle">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.memenuhi.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('nominasi_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.nominasis.index") }}" class="nav-link {{ request()->is('admin/nominasis') || request()->is('admin/nominasis/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-crown">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.nominasi.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('rekapitulasi_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.rekapitulasis.index") }}" class="nav-link {{ request()->is('admin/rekapitulasis') || request()->is('admin/rekapitulasis/*') ? 'active' : '' }}">
                                        <i class="fa-fw fas fa-chart-line">

                                        </i>
                                        <p>
                                            <span>{{ trans('cruds.rekapitulasi.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('audit_log_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.audit-logs.index") }}" class="nav-link {{ request()->is('admin/audit-logs') || request()->is('admin/audit-logs/*') ? 'active' : '' }}">
                            <i class="fa-fw fas fa-file-alt">

                            </i>
                            <p>
                                <span>{{ trans('cruds.auditLog.title') }}</span>
                            </p>
                        </a>
                    </li>
                @endcan
                @can('riwayat_user_access')
                    <li class="nav-item">
                        <a href="{{ route("admin.riwayat-users.index") }}" class="nav-link {{ request()->is('admin/riwayat-users') || request()->is('admin/riwayat-users/*') ? 'active' : '' }}">
                            <i class="fa-fw fas fa-cogs">

                            </i>
                            <p>
                                <span>{{ trans('cruds.riwayatUser.title') }}</span>
                            </p>
                        </a>
                    </li>
                @endcan
                <li class="nav-item">
                    <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                        <p>
                            <i class="fas fa-fw fa-sign-out-alt">

                            </i>
                            <span>{{ trans('global.logout') }}</span>
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>