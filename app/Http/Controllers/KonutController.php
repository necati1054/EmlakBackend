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
        $data = Konut::orderBy('created_at', 'desc')
            ->with('photos', 'ilan.user', 'firstPhoto')
            ->get();
        return $data;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function activePassive($id)
    {
        $data = Konut::find($id);
        $data->is_active = !$data->is_active;
        $data->save();

        return response()->json([
            'message' => 'İlan Başarıyla Güncellendi'
        ], 201);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $konut = new Konut([
            'ilan_basligi' => $data['ilan_basligi'],
            'açıklama' => $data['aciklama'],
            'teklif_tipi' => $data['teklif_tipi'],
            'taşınmaz_türü' => $data['tasinmaz_turu'],
            'fiyat' => $data['fiyat'],
            'm2_brüt' => $data['m2_brut'],
            'm2_net' => $data['m2_net'],
            'açık_alan_m2' => $data['acik_alan_m2'],
            'arazi_m2' => $data['arazi_m2'],
            'oda_sayisi' => $data['oda_sayisi'],
            'salon_sayisi' => $data['salon_sayisi'],
            'bina_yaşı' => $data['bina_yasi'],
            'kat_sayisi' => $data['kat_sayisi'],
            'bulunduğu_kat' => $data['bulundugu_kat'],
            'ısıtma' => $data['isitma'],
            'yapı_tipi' => $data['yapi_tipi'],
            'banyo_sayisi' => $data['banyo_sayisi'],
            'balkon' => $data['balkon'] == 'true' ? 1 : 0,
            'yapının_durumu' => $data['yapinin_durumu'],
            'asansör' => $data['asansor'] == 'true' ? 1 : 0,
            'otopark' => $data['otopark'] == 'true' ? 1 : 0,
            'eşyalı' => $data['esyali'] == 'true' ? 1 : 0,
            'kullanım_durumu' => $data['kullanim_durumu'],
            'aidat' => $data['aidat'],
            'krediye_uygun' => $data['krediye_uygun'] == 'true' ? 1 : 0,
            'zemin_etüdü' => $data['zemin_etudu'] == 'true' ? 1 : 0,
            'tapu_durumu' => $data['tapu_durumu'],
            'taşınmaz_numarası' => $data['tasinmaz_numarasi'],
            'takaslı' => $data['takasli'] == 'true' ? 1 : 0,
            'İl' => $data['Il'],
            'İlçe' => $data['Ilce'],
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

        $konut->load('photos', 'ilan.user');

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
            'açıklama' => $data['aciklama'],
            'teklif_tipi' => $data['teklif_tipi'],
            'taşınmaz_türü' => $data['tasinmaz_turu'],
            'fiyat' => $data['fiyat'],
            'm2_brüt' => $data['m2_brut'],
            'm2_net' => $data['m2_net'],
            'açık_alan_m2' => $data['acik_alan_m2'],
            'arazi_m2' => $data['arazi_m2'],
            'oda_sayisi' => $data['oda_sayisi'],
            'salon_sayisi' => $data['salon_sayisi'],
            'bina_yaşı' => $data['bina_yasi'],
            'kat_sayisi' => $data['kat_sayisi'],
            'bulunduğu_kat' => $data['bulundugu_kat'],
            'ısıtma' => $data['isitma'],
            'yapı_tipi' => $data['yapi_tipi'],
            'banyo_sayisi' => $data['banyo_sayisi'],
            'balkon' => $data['balkon'] == 'true' ? 1 : 0,
            'yapının_durumu' => $data['yapinin_durumu'],
            'asansör' => $data['asansor'] == 'true' ? 1 : 0,
            'otopark' => $data['otopark'] == 'true' ? 1 : 0,
            'eşyalı' => $data['esyali'] == 'true' ? 1 : 0,
            'kullanım_durumu' => $data['kullanim_durumu'],
            'aidat' => $data['aidat'],
            'krediye_uygun' => $data['krediye_uygun'] == 'true' ? 1 : 0,
            'zemin_etüdü' => $data['zemin_etudu'] == 'true' ? 1 : 0,
            'tapu_durumu' => $data['tapu_durumu'],
            'taşınmaz_numarası' => $data['tasinmaz_numarasi'],
            'takaslı' => $data['takasli'] == 'true' ? 1 : 0,
            'İl' => $data['Il'],
            'İlçe' => $data['Ilce'],
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
        $konut->is_active = 0;
        $konut->save();
        $konut->delete();

        $Ilan = Ilan::where('ilanable_id', $id)->where('ilanable_type', Konut::class)->first();
        $Ilan->delete();

        return response()->json([
            'message' => 'İlan Başarıyla Silindi'
        ], 201);
    }
}
