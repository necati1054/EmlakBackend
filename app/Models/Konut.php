<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Konut extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'ilan_basligi',
        'açıklama',
        'teklif_tipi',
        'taşınmaz_türü',
        'fiyat',
        'm2_brüt',
        'm2_net',
        'açık_alan_m2',
        'arazi_m2',
        'oda_sayisi',
        'salon_sayisi',
        'bina_yaşı',
        'kat_sayisi',
        'bulunduğu_kat',
        'ısıtma',
        'yapı_tipi',
        'banyo_sayisi',
        'balkon',
        'yapının_durumu',
        'asansör',
        'otopark',
        'eşyalı',
        'kullanım_durumu',
        'aidat',
        'krediye_uygun',
        'zemin_etüdü',
        'tapu_durumu',
        'taşınmaz_numarası',
        'takaslı',
        'İl',
        'İlçe',
        'Mahalle',
        'lat',
        'lng',
    ];

    public function photos()
    {
        return $this->morphMany(Photo::class, 'imageable')->orderBy('order', 'asc');
    }

    public function ilan()
    {
        return $this->morphOne(Ilan::class, 'ilanable');
    }
}
