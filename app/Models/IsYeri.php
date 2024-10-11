<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class IsYeri extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'ilan_basligi',
        'açıklama',
        'teklif_tipi',
        'taşınmaz_türü',
        'fiyat',
        'm2',
        'bölüm_oda_sayisi',
        'açık_alan_m2',
        'giriş_yüksekliği',
        'kapalı_alan_m2',
        'oda_sayisi',
        'yapı_tipi',
        'yapı_durumu',
        'kat_sayisi',
        'bina_yaşı',
        'aidat',
        'ısıtma',
        'yapının_durumu',
        'alkol_ruhsatı',
        'bulunduğu_kat',
        'asansör_sayisi',
        'kiracılı',
        'krediye_uygunluk',
        'kullanım_durumu',
        'zemin_etüdü',
        'tapu_durumu',
        'taşınmaz_numarası',
        'durumu',
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
}
