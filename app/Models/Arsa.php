<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Arsa extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'ilan_basligi',
        'açıklama',
        'teklif_tipi',
        'fiyat',
        'imar_durumu',
        'm2',
        'ada_no',
        'parsel_no',
        'pafta_no',
        'kaks',
        'gabari',
        'depozito',
        'krediye_uygunluk',
        'tapu_durumu',
        'taşınmaz_numarası',
        'takaslı',
        'İl',
        'İlçe',
        'Mahalle',
        'lat',
        'lng',
        'is_active'
    ];

    public function photos()
    {
        return $this->morphMany(Photo::class, 'imageable')->orderBy('order', 'asc');
    }

    public function ilan()
    {
        return $this->morphOne(Ilan::class, 'ilanable');
    }

    public function firstPhoto()
    {
        return $this->morphOne(Photo::class, 'imageable')->orderBy('order', 'asc');
    }
}
