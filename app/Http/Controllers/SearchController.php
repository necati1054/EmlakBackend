<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Arsa;
use App\Models\IsYeri;
use App\Models\Konut;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        //ENUM - (1 => Konut, 2 => IsYeri, 3 => Arsa)
        $ilanType = $request->ilan_type;

        $model = null;
        switch ($ilanType) {
            case 1:
                $model = Konut::query();
                break;
            case 2:
                $model = IsYeri::query();
                break;
            case 3:
                $model = Arsa::query();
                break;
            default:
                return response()->json(['error' => 'Geçersiz ilan türü'], 400);
        }

        //ANCHOR - Ortak kolonlara göre filtreleme
        if ($request->has('ilan_basligi')) {
            $model->where('ilan_basligi', 'like', '%' . $request->input('ilan_basligi') . '%');
        }
        if ($request->has('fiyat_min')) {
            $model->where('fiyat', '>=', $request->input('fiyat_min'));
        }
        if ($request->has('fiyat_max')) {
            $model->where('fiyat', '<=', $request->input('fiyat_max'));
        }
        if ($request->has('created_at_min')) {
            $model->where('created_at', '>=', $request->input('created_at_min'));
        }
        if ($request->has('created_at_max')) {
            $model->where('created_at', '<=', $request->input('created_at_max'));
        }
        if ($request->has('teklif_tipi')) {
            $model->where('teklif_tipi', $request->input('teklif_tipi'));
        }
        if ($request->has('krediye_uygun')) {
            $model->where('krediye_uygun', $request->input('krediye_uygun'));
        }
        if ($request->has('krediye_uygunluk')) {
            $model->where('krediye_uygunluk', $request->input('krediye_uygunluk'));
        }
        if ($request->has('tapu_durumu')) {
            $model->where('tapu_durumu', $request->input('tapu_durumu'));
        }
        if ($request->has('taşınmaz_numarası')) {
            $model->where('taşınmaz_numarası', $request->input('taşınmaz_numarası'));
        }
        if ($request->has('takaslı')) {
            $model->where('takaslı', $request->input('takaslı'));
        }
        if ($request->has('il')) {
            $model->where('il', $request->input('il'));
        }
        if ($request->has('ilçe')) {
            $model->where('ilçe', $request->input('ilçe'));
        }
        if ($request->has('mahalle')) {
            $model->where('mahalle', $request->input('mahalle'));
        }
        if ($request->has('lat')) {
            $model->where('lat', $request->input('lat'));
        }
        if ($request->has('lng')) {
            $model->where('lng', $request->input('lng'));
        }

        // İlan tipine özgü filtreleme
        switch ($ilanType) {
            case 1: // Konut
                if ($request->has('oda_sayisi')) {
                    $model->where('oda_sayisi', $request->input('oda_sayisi'));
                }
                if ($request->has('bina_yaşı')) {
                    $model->where('bina_yaşı', '<=', $request->input('bina_yaşı'));
                }
                break;

            case 2: // IsYeri
                if ($request->has('kat_sayisi')) {
                    $model->where('kat_sayisi', '>=', $request->input('kat_sayisi'));
                }
                if ($request->has('asansör_sayisi')) {
                    $model->where('asansör_sayisi', '>=', $request->input('asansör_sayisi'));
                }
                break;

            case 3: // Arsa
                if ($request->has('m2_min')) {
                    $model->where('m2', '>=', $request->input('m2_min'));
                }
                if ($request->has('m2_max')) {
                    $model->where('m2', '<=', $request->input('m2_max'));
                }
                if ($request->has('imar_durumu')) {
                    $model->where('imar_durumu', $request->input('imar_durumu'));
                }
                if ($request->has('ada_no')) {
                    $model->where('ada_no', $request->input('ada_no'));
                }
                if ($request->has('parsel_no')) {
                    $model->where('parsel_no', $request->input('parsel_no'));
                }
                if ($request->has('pafta_no')) {
                    $model->where('pafta_no', $request->input('pafta_no'));
                }
                if ($request->has('kaks')) {
                    $model->where('kaks', $request->input('kaks'));
                }
                if ($request->has('gabari')) {
                    $model->where('gabari', $request->input('gabari'));
                }
                if ($request->has('depozito_min')) {
                    $model->where('depozito', '>=', $request->input('depozito_min'));
                }
                if ($request->has('depozito_max')) {
                    $model->where('depozito', '<=', $request->input('depozito_max'));
                }
                break;
        }

        // Photos ilişkisini yükle ve sonuçları döndür
        $results = $model->with('photos')->get();

        return response()->json($results);
    }
}
