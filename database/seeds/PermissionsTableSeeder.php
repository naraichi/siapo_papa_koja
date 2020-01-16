<?php

use App\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => '1',
                'title' => 'user_management_access',
            ],
            [
                'id'    => '2',
                'title' => 'permission_create',
            ],
            [
                'id'    => '3',
                'title' => 'permission_edit',
            ],
            [
                'id'    => '4',
                'title' => 'permission_show',
            ],
            [
                'id'    => '5',
                'title' => 'permission_delete',
            ],
            [
                'id'    => '6',
                'title' => 'permission_access',
            ],
            [
                'id'    => '7',
                'title' => 'role_create',
            ],
            [
                'id'    => '8',
                'title' => 'role_edit',
            ],
            [
                'id'    => '9',
                'title' => 'role_show',
            ],
            [
                'id'    => '10',
                'title' => 'role_delete',
            ],
            [
                'id'    => '11',
                'title' => 'role_access',
            ],
            [
                'id'    => '12',
                'title' => 'user_create',
            ],
            [
                'id'    => '13',
                'title' => 'user_edit',
            ],
            [
                'id'    => '14',
                'title' => 'user_show',
            ],
            [
                'id'    => '15',
                'title' => 'user_delete',
            ],
            [
                'id'    => '16',
                'title' => 'user_access',
            ],
            [
                'id'    => '17',
                'title' => 'skpd_create',
            ],
            [
                'id'    => '18',
                'title' => 'skpd_edit',
            ],
            [
                'id'    => '19',
                'title' => 'skpd_show',
            ],
            [
                'id'    => '20',
                'title' => 'skpd_delete',
            ],
            [
                'id'    => '21',
                'title' => 'skpd_access',
            ],
            [
                'id'    => '22',
                'title' => 'prposal_inovasi_access',
            ],
            [
                'id'    => '23',
                'title' => 'pengajuan_access',
            ],
            [
                'id'    => '24',
                'title' => 'tidak_memenuhi_access',
            ],
            [
                'id'    => '25',
                'title' => 'memenuhi_access',
            ],
            [
                'id'    => '26',
                'title' => 'nominasi_access',
            ],
            [
                'id'    => '27',
                'title' => 'rekapitulasi_access',
            ],
            [
                'id'    => '28',
                'title' => 'pengaturan_halaman_access',
            ],
            [
                'id'    => '29',
                'title' => 'event_access',
            ],
            [
                'id'    => '30',
                'title' => 'indikator_formulir_access',
            ],
            [
                'id'    => '31',
                'title' => 'indikator_proposal_access',
            ],
            [
                'id'    => '32',
                'title' => 'kategori_proposal_access',
            ],
            [
                'id'    => '33',
                'title' => 'management_pengguna_access',
            ],
            [
                'id'    => '34',
                'title' => 'audit_log_show',
            ],
            [
                'id'    => '35',
                'title' => 'audit_log_access',
            ],
            [
                'id'    => '36',
                'title' => 'data_master_proposal_access',
            ],
            [
                'id'    => '37',
                'title' => 'kategori_access',
            ],
            [
                'id'    => '38',
                'title' => 'indikator_formulir_proposal_access',
            ],
            [
                'id'    => '39',
                'title' => 'indikator_proposal_inovasi_access',
            ],
            [
                'id'    => '40',
                'title' => 'dasar_hukum_create',
            ],
            [
                'id'    => '41',
                'title' => 'dasar_hukum_edit',
            ],
            [
                'id'    => '42',
                'title' => 'dasar_hukum_show',
            ],
            [
                'id'    => '43',
                'title' => 'dasar_hukum_delete',
            ],
            [
                'id'    => '44',
                'title' => 'dasar_hukum_access',
            ],
            [
                'id'    => '45',
                'title' => 'pengumuman_create',
            ],
            [
                'id'    => '46',
                'title' => 'pengumuman_edit',
            ],
            [
                'id'    => '47',
                'title' => 'pengumuman_show',
            ],
            [
                'id'    => '48',
                'title' => 'pengumuman_delete',
            ],
            [
                'id'    => '49',
                'title' => 'pengumuman_access',
            ],
            [
                'id'    => '50',
                'title' => 'unduhan_create',
            ],
            [
                'id'    => '51',
                'title' => 'unduhan_edit',
            ],
            [
                'id'    => '52',
                'title' => 'unduhan_show',
            ],
            [
                'id'    => '53',
                'title' => 'unduhan_delete',
            ],
            [
                'id'    => '54',
                'title' => 'unduhan_access',
            ],
            [
                'id'    => '55',
                'title' => 'kontak_create',
            ],
            [
                'id'    => '56',
                'title' => 'kontak_edit',
            ],
            [
                'id'    => '57',
                'title' => 'kontak_show',
            ],
            [
                'id'    => '58',
                'title' => 'kontak_delete',
            ],
            [
                'id'    => '59',
                'title' => 'kontak_access',
            ],
            [
                'id'    => '60',
                'title' => 'riwayat_user_access',
            ],
        ];

        Permission::insert($permissions);
    }
}
