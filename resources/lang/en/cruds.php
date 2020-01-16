<?php

return [
    'userManagement'            => [
        'title'          => 'User management',
        'title_singular' => 'User management',
    ],
    'permission'                => [
        'title'          => 'Permissions',
        'title_singular' => 'Permission',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => '',
            'title'             => 'Title',
            'title_helper'      => '',
            'created_at'        => 'Created at',
            'created_at_helper' => '',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => '',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => '',
        ],
    ],
    'role'                      => [
        'title'          => 'Roles',
        'title_singular' => 'Role',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => '',
            'title'              => 'Title',
            'title_helper'       => '',
            'permissions'        => 'Permissions',
            'permissions_helper' => '',
            'created_at'         => 'Created at',
            'created_at_helper'  => '',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => '',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => '',
        ],
    ],
    'user'                      => [
        'title'          => 'Users',
        'title_singular' => 'User',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => '',
            'name'                     => 'Nama Pengguna',
            'name_helper'              => '',
            'email'                    => 'Email',
            'email_helper'             => '',
            'email_verified_at'        => 'Email verified at',
            'email_verified_at_helper' => '',
            'password'                 => 'Password',
            'password_helper'          => '',
            'roles'                    => 'Roles',
            'roles_helper'             => '',
            'remember_token'           => 'Remember Token',
            'remember_token_helper'    => '',
            'created_at'               => 'Created at',
            'created_at_helper'        => '',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => '',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => '',
            'photo'                    => 'Photo',
            'photo_helper'             => '',
            'skpd'                     => 'Skpd',
            'skpd_helper'              => '',
        ],
    ],
    'skpd'                      => [
        'title'          => 'SKPD',
        'title_singular' => 'SKPD',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => '',
            'nm_skpd'            => 'Nama SKPD',
            'nm_skpd_helper'     => '',
            'initial'            => 'Initial',
            'initial_helper'     => '',
            'created_at'         => 'Created at',
            'created_at_helper'  => '',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => '',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => '',
            'is_sub_unit'        => 'Apakah sub dari SKPD',
            'is_sub_unit_helper' => '',
            'sub_unit'           => 'Nama Sub Unit',
            'sub_unit_helper'    => '',
            'is_aktif'           => 'Is Aktif',
            'is_aktif_helper'    => '',
        ],
    ],
    'prposalInovasi'            => [
        'title'          => 'Proposal Inovasi',
        'title_singular' => 'Proposal Inovasi',
    ],
    'pengajuan'                 => [
        'title'          => 'Pengajuan',
        'title_singular' => 'Pengajuan',
    ],
    'tidakMemenuhi'             => [
        'title'          => 'Tidak Memenuhi',
        'title_singular' => 'Tidak Memenuhi',
    ],
    'memenuhi'                  => [
        'title'          => 'Memenuhi',
        'title_singular' => 'Memenuhi',
    ],
    'nominasi'                  => [
        'title'          => 'Nominasi',
        'title_singular' => 'Nominasi',
    ],
    'rekapitulasi'              => [
        'title'          => 'Rekapitulasi Proposal',
        'title_singular' => 'Rekapitulasi Proposal',
    ],
    'pengaturanHalaman'         => [
        'title'          => 'Pengaturan Halaman',
        'title_singular' => 'Pengaturan Halaman',
    ],
    'event'                     => [
        'title'          => 'Event',
        'title_singular' => 'Event',
    ],
    'indikatorFormulir'         => [
        'title'          => 'Indikator Formulir',
        'title_singular' => 'Indikator Formulir',
    ],
    'indikatorProposal'         => [
        'title'          => 'Indikator Proposal',
        'title_singular' => 'Indikator Proposal',
    ],
    'kategoriProposal'          => [
        'title'          => 'Kategori Proposal',
        'title_singular' => 'Kategori Proposal',
    ],
    'managementPengguna'        => [
        'title'          => 'Management Pengguna',
        'title_singular' => 'Management Pengguna',
    ],
    'auditLog'                  => [
        'title'          => 'Log Aplikasi',
        'title_singular' => 'Log Aplikasi',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => '',
            'description'         => 'Description',
            'description_helper'  => '',
            'subject_id'          => 'Subject ID',
            'subject_id_helper'   => '',
            'subject_type'        => 'Subject Type',
            'subject_type_helper' => '',
            'user_id'             => 'User ID',
            'user_id_helper'      => '',
            'properties'          => 'Properties',
            'properties_helper'   => '',
            'host'                => 'Host',
            'host_helper'         => '',
            'created_at'          => 'Created at',
            'created_at_helper'   => '',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => '',
        ],
    ],
    'dataMasterProposal'        => [
        'title'          => 'Data Master Proposal',
        'title_singular' => 'Data Master Proposal',
    ],
    'kategori'                  => [
        'title'          => 'Kategori Proposal',
        'title_singular' => 'Kategori Proposal',
    ],
    'indikatorFormulirProposal' => [
        'title'          => 'Indikator Formulir',
        'title_singular' => 'Indikator Formulir',
    ],
    'indikatorProposalInovasi'  => [
        'title'          => 'Indikator Proposal',
        'title_singular' => 'Indikator Proposal',
    ],
    'dasarHukum'                => [
        'title'          => 'Dasar Hukum',
        'title_singular' => 'Dasar Hukum',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => '',
            'uraian'            => 'Uraian',
            'uraian_helper'     => '',
            'nomor'             => 'Nomor',
            'nomor_helper'      => '',
            'tahun'             => 'Tahun',
            'tahun_helper'      => '',
            'file'              => 'File',
            'file_helper'       => 'File harus *.pdf max : 5mb',
            'created_by'        => 'Created By',
            'created_by_helper' => '',
            'created_at'        => 'Created at',
            'created_at_helper' => '',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => '',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => '',
        ],
    ],
    'pengumuman'                => [
        'title'          => 'Pengumuman',
        'title_singular' => 'Pengumuman',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => '',
            'uraian'            => 'Uraian',
            'uraian_helper'     => '',
            'file'              => 'File',
            'file_helper'       => 'File harus *.pdf max : 5mb',
            'user'              => 'User',
            'user_helper'       => '',
            'created_at'        => 'Created at',
            'created_at_helper' => '',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => '',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => '',
            'is_arsip'          => 'Is Arsip',
            'is_arsip_helper'   => '',
        ],
    ],
    'unduhan'                   => [
        'title'          => 'Unduhan',
        'title_singular' => 'Unduhan',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => '',
            'uraian'            => 'Uraian',
            'uraian_helper'     => '',
            'file'              => 'File',
            'file_helper'       => 'File harus *.pdf max : 5mb',
            'created_by'        => 'Created By',
            'created_by_helper' => '',
            'created_at'        => 'Created at',
            'created_at_helper' => '',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => '',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => '',
        ],
    ],
    'kontak'                    => [
        'title'          => 'Kontak',
        'title_singular' => 'Kontak',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => '',
            'uraian'            => 'Uraian',
            'uraian_helper'     => '',
            'detail'            => 'Detail',
            'detail_helper'     => '',
            'created_by'        => 'Created By',
            'created_by_helper' => '',
            'created_at'        => 'Created at',
            'created_at_helper' => '',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => '',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => '',
        ],
    ],
    'riwayatUser'               => [
        'title'          => 'Riwayat User',
        'title_singular' => 'Riwayat User',
    ],
];
