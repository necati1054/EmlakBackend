<?php

namespace App\Http\Controllers;

use App\Models\IsYeri;
use App\Models\Photo;
use App\Http\Controllers\Controller;
use App\Models\Ilan;
use Illuminate\Http\Request;

class IsYeriController extends Controller
{

    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $data = IsYeri::all()->load('photos');
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
        $isYeri = new IsYeri([
            'ilan_basligi' => $data['ilan_basligi'],
            'açıklama' => $data['açıklama'],
            'teklif_tipi' => $data['teklif_tipi'],
            'taşınmaz_türü' => $data['taşınmaz_türü'],
            'fiyat' => $data['fiyat'],
            'm2' => $data['m2'],
            'bölüm_oda_sayisi' => $data['bölüm_oda_sayisi'],
            'açık_alan_m2' => $data['açık_alan_m2'],
            'giriş_yüksekliği' => $data['giriş_yüksekliği'],
            'kapalı_alan_m2' => $data['kapalı_alan_m2'],
            'oda_sayisi' => $data['oda_sayisi'],
            'yapı_tipi' => $data['yapı_tipi'],
            'yapı_durumu' => $data['yapı_durumu'],
            'kat_sayisi' => $data['kat_sayisi'],
            'bina_yaşı' => $data['bina_yaşı'],
            'aidat' => $data['aidat'],
            'ısıtma' => $data['ısıtma'],
            'yapının_durumu' => $data['yapının_durumu'],
            'alkol_ruhsatı' => $data['alkol_ruhsatı'],
            'bulunduğu_kat' => $data['bulunduğu_kat'],
            'asansör_sayisi' => $data['asansör_sayisi'],
            'kiracılı' => $data['kiracılı'],
            'krediye_uygunluk' => $data['krediye_uygunluk'],
            'kullanım_durumu' => $data['kullanım_durumu'],
            'zemin_etüdü' => $data['zemin_etüdü'],
            'tapu_durumu' => $data['tapu_durumu'],
            'taşınmaz_numarası' => $data['taşınmaz_numarası'],
            'durumu' => $data['durumu'],
            'takaslı' => $data['takaslı'],
            'İl' => $data['İl'],
            'İlçe' => $data['İlçe'],
            'Mahalle' => $data['Mahalle'],
            'lat' => $data['lat'],
            'lng' => $data['lng'],
        ]);

        $isYeri->save();

        $ilan = new Ilan([
            'ilanable_type' => IsYeri::class,
            'ilanable_id' => $isYeri->id,
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

                $data->imageable_type = IsYeri::class;
                $data->imageable_id = $isYeri->id;
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
    public function show(IsYeri $isYeri, $id)
    {
        $isYeri = IsYeri::find($id);

        if (!$isYeri) {
            return  null;
        }

        $isYeri->load('photos');

        return $isYeri;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(IsYeri $isYeri)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, IsYeri $isYeri, $id)
    {
        $data = $request->all();
        $IsYeri = IsYeri::find($id);

        $IsYeri->updata([
            'ilan_basligi' => $data['ilan_basligi'],
            'açıklama' => $data['açıklama'],
            'teklif_tipi' => $data['teklif_tipi'],
            'taşınmaz_türü' => $data['taşınmaz_türü'],
            'fiyat' => $data['fiyat'],
            'm2' => $data['m2'],
            'bölüm_oda_sayisi' => $data['bölüm_oda_sayisi'],
            'açık_alan_m2' => $data['açık_alan_m2'],
            'giriş_yüksekliği' => $data['giriş_yüksekliği'],
            'kapalı_alan_m2' => $data['kapalı_alan_m2'],
            'oda_sayisi' => $data['oda_sayisi'],
            'yapı_tipi' => $data['yapı_tipi'],
            'yapı_durumu' => $data['yapı_durumu'],
            'kat_sayisi' => $data['kat_sayisi'],
            'bina_yaşı' => $data['bina_yaşı'],
            'aidat' => $data['aidat'],
            'ısıtma' => $data['ısıtma'],
            'yapının_durumu' => $data['yapının_durumu'],
            'alkol_ruhsatı' => $data['alkol_ruhsatı'],
            'bulunduğu_kat' => $data['bulunduğu_kat'],
            'asansör_sayisi' => $data['asansör_sayisi'],
            'kiracılı' => $data['kiracılı'],
            'krediye_uygunluk' => $data['krediye_uygunluk'],
            'kullanım_durumu' => $data['kullanım_durumu'],
            'zemin_etüdü' => $data['zemin_etüdü'],
            'tapu_durumu' => $data['tapu_durumu'],
            'taşınmaz_numarası' => $data['taşınmaz_numarası'],
            'durumu' => $data['durumu'],
            'takaslı' => $data['takaslı'],
            'İl' => $data['İl'],
            'İlçe' => $data['İlçe'],
            'Mahalle' => $data['Mahalle'],
            'lat' => $data['lat'],
            'lng' => $data['lng'],
        ]);

        return response()->json([
            'message' => 'İlan Başarıyla Güncellendi'
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(IsYeri $isYeri, $id)
    {
        $isYeri = IsYeri::find($id);
        $isYeri->delete();

        return response()->json([
            'message' => 'İlan Başarıyla Silindi'
        ], 201);
    }
}
