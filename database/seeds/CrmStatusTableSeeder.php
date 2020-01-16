<?php

use App\CrmStatus;
use Illuminate\Database\Seeder;

class CrmStatusTableSeeder extends Seeder
{
    public function run()
    {
        $crmStatuses = [
            [
                'id'         => '1',
                'name'       => 'Lead',
                'created_at' => '2020-01-16 03:17:01',
                'updated_at' => '2020-01-16 03:17:01',
            ],
            [
                'id'         => '2',
                'name'       => 'Customer',
                'created_at' => '2020-01-16 03:17:01',
                'updated_at' => '2020-01-16 03:17:01',
            ],
            [
                'id'         => '3',
                'name'       => 'Partner',
                'created_at' => '2020-01-16 03:17:01',
                'updated_at' => '2020-01-16 03:17:01',
            ],
        ];

        CrmStatus::insert($crmStatuses);
    }
}
