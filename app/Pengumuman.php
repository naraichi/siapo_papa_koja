<?php

namespace App;

use App\Traits\Auditable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class Pengumuman extends Model implements HasMedia
{
    use HasMediaTrait, Auditable;

    public $table = 'pengumumen';

    protected $appends = [
        'file',
    ];

    protected $dates = [
        'is_arsip',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'uraian',
        'user_id',
        'is_arsip',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')->width(50)->height(50);
    }

    public function getFileAttribute()
    {
        return $this->getMedia('file')->last();
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getIsArsipAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setIsArsipAttribute($value)
    {
        $this->attributes['is_arsip'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }
}
