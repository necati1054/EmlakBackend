<?php

namespace App\Http\Controllers;

use App\Models\Arsa;
use App\Models\Photo;
use App\Http\Controllers\Controller;
use App\Models\Ilan;
use Illuminate\Http\Request;

class ArsaController extends Controller
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
        $data = Arsa::all()->load('photos', 'ilan.user');
        return $data;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function activePassive($id)
    {
        $data = Arsa::find($id);
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
        $arsa = new Arsa([
            'ilan_basligi' => $data['ilan_basligi'],
            'açıklama' => $data['aciklama'],
            'teklif_tipi' => $data['teklif_tipi'],
            'fiyat' => $data['fiyat'],
            'imar_durumu' => $data['imar_durumu'],
            'm2' => $data['m2'],
            'ada_no' => $data['ada_no'],
            'parsel_no' => $data['parsel_no'],
            'pafta_no' => $data['pafta_no'],
            'kaks' => $data['kaks'],
            'gabari' => $data['gabari'],
            'depozito' => $data['depozito'],
            'krediye_uygunluk' => $data['krediye_uygunluk'] ? 1 : 0,
            'tapu_durumu' => $data['tapu_durumu'],
            'taşınmaz_numarası' => $data['tasınmaz_numarasi'],
            'takaslı' => $data['takasli'] ? 1 : 0,
            'İl' => $data['Il'],
            'İlçe' => $data['Ilce'],
            'Mahalle' => $data['Mahalle'],
            'lat' => $data['lat'],
            'lng' => $data['lng'],
        ]);

        $arsa->save();

        $ilan = new Ilan([
            'ilanable_type' => Arsa::class,
            'ilanable_id' => $arsa->id,
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

                $data->imageable_type = Arsa::class;
                $data->imageable_id = $arsa->id;
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
    public function show(Arsa $arsa, $id)
    {
        $arsa = Arsa::find($id);

        if (!$arsa) {
            return  null;
        }

        $arsa->load('photos', 'ilan.user');

        return $arsa;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Arsa $arsa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Arsa $arsa, $id)
    {
        $data = $request->all();
        $arsa = Arsa::find($id);
        $arsa->update([
            'ilan_basligi' => $data['ilan_basligi'],
            'açıklama' => $data['açıklama'],
            'teklif_tipi' => $data['teklif_tipi'],
            'fiyat' => $data['fiyat'],
            'imar_durumu' => $data['imar_durumu'],
            'm2' => $data['m2'],
            'ada_no' => $data['ada_no'],
            'parsel_no' => $data['parsel_no'],
            'pafta_no' => $data['pafta_no'],
            'kaks' => $data['kaks'],
            'gabari' => $data['gabari'],
            'depozito' => $data['depozito'],
            'krediye_uygunluk' => $data['krediye_uygunluk'],
            'tapu_durumu' => $data['tapu_durumu'],
            'taşınmaz_numarası' => $data['taşınmaz_numarası'],
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
    public function destroy(Arsa $arsa, $id)
    {
        $isYeri = Arsa::find($id);
        $isYeri->is_active = 0;
        $isYeri->save();
        $isYeri->delete();

        $Ilan = Ilan::where('ilanable_id', $id)->where('ilanable_type', Arsa::class)->first();
        $Ilan->delete();

        return response()->json([
            'message' => 'İlan Başarıyla Silindi'
        ], 201);
    }
}
