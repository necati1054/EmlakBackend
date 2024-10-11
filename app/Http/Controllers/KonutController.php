<?php

namespace App\Http\Controllers;

use App\Models\Konut;
use App\Models\Photo;
use App\Http\Controllers\Controller;
use App\Models\Ilan;
use Illuminate\Http\Request;

class KonutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Konut::all()->load('photos');
        return $data;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $konut = new Konut([
            'ilan_basligi' => $data['ilan_basligi'],
            'açıklama' => $data['açıklama'],
            'teklif_tipi' => $data['teklif_tipi'],
            'taşınmaz_türü' => $data['taşınmaz_türü'],
            'fiyat' => $data['fiyat'],
            'm2_brüt' => $data['m2_brüt'],
            'm2_net' => $data['m2_net'],
            'açık_alan_m2' => $data['açık_alan_m2'],
            'arazi_m2' => $data['arazi_m2'],
            'oda_sayisi' => $data['oda_sayisi'],
            'salon_sayisi' => $data['salon_sayisi'],
            'bina_yaşı' => $data['bina_yaşı'],
            'kat_sayisi' => $data['kat_sayisi'],
            'bulunduğu_kat' => $data['bulunduğu_kat'],
            'ısıtma' => $data['ısıtma'],
            'yapı_tipi' => $data['yapı_tipi'],
            'banyo_sayisi' => $data['banyo_sayisi'],
            'balkon' => $data['balkon'],
            'yapının_durumu' => $data['yapının_durumu'],
            'asansör' => $data['asansör'],
            'otopark' => $data['otopark'],
            'eşyalı' => $data['eşyalı'],
            'kullanım_durumu' => $data['kullanım_durumu'],
            'aidat' => $data['aidat'],
            'krediye_uygun' => $data['krediye_uygun'],
            'zemin_etüdü' => $data['zemin_etüdü'],
            'tapu_durumu' => $data['tapu_durumu'],
            'taşınmaz_numarası' => $data['taşınmaz_numarası'],
            'takaslı' => $data['takaslı'],
            'İl' => $data['İl'],
            'İlçe' => $data['İlçe'],
            'Mahalle' => $data['Mahalle'],
            'lat' => $data['lat'],
            'lng' => $data['lng'],
        ]);

        $konut->save();

        $ilan = new Ilan([
            'ilanable_type' => Konut::class,
            'ilanable_id' => $konut->id,
            'user_id' => $data['user_id'],
        ]);

        $ilan->save();

        $files = $request->file('images');
        if ($request->file('images')) {
            $i = 0;
            foreach ($files as $file) {
                $data = new Photo();

                $imageName = time() . '_' . $file->getClientOriginalName();
                $file->move(\public_path('Image'), $imageName);

                $data->imageable_type = Konut::class;
                $data->imageable_id = $konut->id;
                $data->order = $i;
                $data->path = $imageName;
                $data->save();
                $i += 1;
            }
        }

        return response()->json([
            'message' => 'İlan Başarıyla Eklendi'
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Konut $konut, $id)
    {
        $konut = Konut::find($id);

        if (!$konut) {
            return  null;
        }

        $konut->load('photos');

        return $konut;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Konut $konut)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Konut $konut, $id)
    {
        $data = $request->all();
        $konut = Konut::find($id);

        $konut->update([
            'ilan_basligi' => $data['ilan_basligi'],
            'açıklama' => $data['açıklama'],
            'teklif_tipi' => $data['teklif_tipi'],
            'taşınmaz_türü' => $data['taşınmaz_türü'],
            'fiyat' => $data['fiyat'],
            'm2_brüt' => $data['m2_brüt'],
            'm2_net' => $data['m2_net'],
            'açık_alan_m2' => $data['açık_alan_m2'],
            'arazi_m2' => $data['arazi_m2'],
            'oda_sayisi' => $data['oda_sayisi'],
            'salon_sayisi' => $data['salon_sayisi'],
            'bina_yaşı' => $data['bina_yaşı'],
            'kat_sayisi' => $data['kat_sayisi'],
            'bulunduğu_kat' => $data['bulunduğu_kat'],
            'ısıtma' => $data['ısıtma'],
            'yapı_tipi' => $data['yapı_tipi'],
            'banyo_sayisi' => $data['banyo_sayisi'],
            'balkon' => $data['balkon'],
            'yapının_durumu' => $data['yapının_durumu'],
            'asansör' => $data['asansör'],
            'otopark' => $data['otopark'],
            'eşyalı' => $data['eşyalı'],
            'kullanım_durumu' => $data['kullanım_durumu'],
            'aidat' => $data['aidat'],
            'krediye_uygun' => $data['krediye_uygun'],
            'zemin_etüdü' => $data['zemin_etüdü'],
            'tapu_durumu' => $data['tapu_durumu'],
            'taşınmaz_numarası' => $data['taşınmaz_numarası'],
            'takaslı' => $data['takaslı'],
            'İl' => $data['İl'],
            'İlçe' => $data['İlçe'],
            'Mahalle' => $data['Mahalle'],
            'lat' => $data['lat'],
            'lng' => $data['lng'],
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Konut $konut, $id)
    {
        $konut = Konut::find($id);
        $konut->delete();

        return response()->json([
            'message' => 'İlan Başarıyla Silindi'
        ], 201);
    }
}
