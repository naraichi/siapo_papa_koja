<?php

namespace App;

use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Model;

class Skpd extends Model
{
    use Auditable;

    public $table = 'skpds';

    const IS_SUB_UNIT_SELECT = [
        '0' => 'Tidak',
        '1' => 'Ya',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const IS_AKTIF_SELECT = [
        '0' => 'Non-Aktif',
        '1' => 'Aktif',
    ];

    protected $fillable = [
        'nm_skpd',
        'initial',
        'sub_unit',
        'is_aktif',
        'created_at',
        'updated_at',
        'deleted_at',
        'is_sub_unit',
    ];

    public function skpdUsers()
    {
        return $this->hasMany(User::class, 'skpd_id', 'id');
    }
}
