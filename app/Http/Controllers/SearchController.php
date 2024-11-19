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
        $ilanType = $request->input("searchValues.ilan_type");

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
        if ($request->has('searchValues.ilan_basligi')) {
            $model->where('ilan_basligi', 'like', '%' . $request->input('searchValues.ilan_basligi') . '%');
        }
        if ($request->has('searchValues.fiyat_min')) {
            $model->where('fiyat', '>=', $request->input('searchValues.fiyat_min'));
        }
        if ($request->has('searchValues.fiyat_max')) {
            $model->where('fiyat', '<=', $request->input('searchValues.fiyat_max'));
        }
        if ($request->has('searchValues.created_at_min')) {
            $model->where('created_at', '>=', $request->input('searchValues.created_at_min'));
        }
        if ($request->has('searchValues.created_at_max')) {
            $model->where('created_at', '<=', $request->input('searchValues.created_at_max'));
        }
        if ($request->has('searchValues.teklif_tipi')) {
            $model->where('teklif_tipi', $request->input('searchValues.teklif_tipi'));
        }
        if ($request->has('searchValues.krediye_uygun')) {
            $model->where('krediye_uygun', $request->input('searchValues.krediye_uygun'));
        }
        if ($request->has('searchValues.krediye_uygunluk')) {
            $model->where('krediye_uygunluk', $request->input('searchValues.krediye_uygunluk'));
        }
        if ($request->has('searchValues.tapu_durumu')) {
            $model->where('tapu_durumu', $request->input('searchValues.tapu_durumu'));
        }
        if ($request->has('searchValues.taşınmaz_numarası')) {
            $model->where('taşınmaz_numarası', $request->input('searchValues.taşınmaz_numarası'));
        }
        if ($request->has('searchValues.takaslı')) {
            $model->where('takaslı', $request->input('searchValues.takaslı'));
        }
        if ($request->has('searchValues.il')) {
            $model->where('İl', $request->input('searchValues.il'));
        }
        if ($request->has('searchValues.ilçe')) {
            $model->where('İlçe', $request->input('searchValues.ilçe'));
        }
        if ($request->has('searchValues.mahalle')) {
            $model->where('Mahalle', $request->input('searchValues.mahalle'));
        }
        if ($request->has('searchValues.lat')) {
            $model->where('lat', $request->input('searchValues.lat'));
        }
        if ($request->has('searchValues.lng')) {
            $model->where('lng', $request->input('searchValues.lng'));
        }

        // İlan tipine özgü filtreleme
        switch ($ilanType) {
            case 1: // Konut
                if ($request->has('searchValues.oda_sayisi')) {
                    $model->where('oda_sayisi', $request->input('searchValues.oda_sayisi'));
                }
                if ($request->has('searchValues.bina_yaşı')) {
                    $model->where('bina_yaşı', '<=', $request->input('searchValues.bina_yaşı'));
                }
                if ($request->has('searchValues.taşınmaz_türü')) {
                    $model->where('taşınmaz_türü', $request->input('searchValues.taşınmaz_türü'));
                }
                break;

            case 2: // IsYeri
                if ($request->has('searchValues.kat_sayisi')) {
                    $model->where('kat_sayisi', '>=', $request->input('searchValues.kat_sayisi'));
                }
                if ($request->has('searchValues.asansör_sayisi')) {
                    $model->where('asansör_sayisi', '>=', $request->input('searchValues.asansör_sayisi'));
                }
                if ($request->has('searchValues.taşınmaz_türü')) {
                    $model->where('taşınmaz_türü', $request->input('searchValues.taşınmaz_türü'));
                }
                break;

            case 3: // Arsa
                if ($request->has('searchValues.m2_min')) {
                    $model->where('m2', '>=', $request->input('searchValues.m2_min'));
                }
                if ($request->has('searchValues.m2_max')) {
                    $model->where('m2', '<=', $request->input('searchValues.m2_max'));
                }
                if ($request->has('searchValues.imar_durumu')) {
                    $model->where('imar_durumu', $request->input('searchValues.imar_durumu'));
                }
                if ($request->has('searchValues.ada_no')) {
                    $model->where('ada_no', $request->input('searchValues.ada_no'));
                }
                if ($request->has('searchValues.parsel_no')) {
                    $model->where('parsel_no', $request->input('searchValues.parsel_no'));
                }
                if ($request->has('searchValues.pafta_no')) {
                    $model->where('pafta_no', $request->input('searchValues.pafta_no'));
                }
                if ($request->has('searchValues.kaks')) {
                    $model->where('kaks', $request->input('searchValues.kaks'));
                }
                if ($request->has('searchValues.gabari')) {
                    $model->where('gabari', $request->input('searchValues.gabari'));
                }
                if ($request->has('searchValues.depozito_min')) {
                    $model->where('depozito', '>=', $request->input('searchValues.depozito_min'));
                }
                if ($request->has('searchValues.depozito_max')) {
                    $model->where('depozito', '<=', $request->input('searchValues.depozito_max'));
                }
                break;
        }

        // Photos ilişkisini yükle ve sonuçları döndür
        $results = $model->with('photos', "firstPhoto", "ilan")->get();

        return response()->json($results);
    }
}
