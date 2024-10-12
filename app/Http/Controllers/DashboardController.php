<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Arsa;
use App\Models\Ilan;
use App\Models\IsYeri;
use App\Models\Konut;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Tymon\JWTAuth\Facades\JWTAuth;

class DashboardController extends Controller
{

    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => []]);
    }

    public function adminDashboard()
    {
        $data = [];

        $data['allUserCount'] = User::count();
        $data['allCorporateVendor'] = User::where('role', '1')->count();
        $data['allSalesPerson'] = User::where('role', '2')->count();
        $data['allSingular'] = User::where('role', '3')->count();

        $AllArsaCount = Arsa::count();
        $AllKonutCount = Konut::count();
        $AllIsYeriCount = IsYeri::count();

        $data['AllArsaCount'] = $AllArsaCount;
        $data['AllKonutCount'] = $AllKonutCount;
        $data['AllIsYeriCount'] = $AllIsYeriCount;
        $data['AllIlanCount'] = $AllArsaCount + $AllKonutCount + $AllIsYeriCount;

        //konut satılan ve kiralanan
        $data['AllKonutKiralanan'] = Konut::where('teklif_tipi', 'kiralık')->where('is_active', 0)->count();
        $data['AllKonutSatilan'] = Konut::where('teklif_tipi', 'satılık')->where('is_active', 0)->count();
        $data['AllKonutAktifİlan'] = Konut::where('is_active', 1)->count();

        //arsa satılan ve kiralanan
        $data['AllArsaKiralanan'] = Arsa::where('teklif_tipi', 'kiralık')->where('is_active', 0)->count();
        $data['AllArsaSatilan'] = Arsa::where('teklif_tipi', 'satılık')->where('is_active', 0)->count();
        $data['AllArsaAktifİlan'] = Arsa::where('is_active', 1)->count();

        //isyeri satılan ve kiralanan
        $data['AllIsYeriKiralanan'] = IsYeri::where('teklif_tipi', 'kiralık')->where('is_active', 0)->count();
        $data['AllIsYeriSatilan'] = IsYeri::where('teklif_tipi', 'satılık')->where('is_active', 0)->count();
        $data['AllIsYeriAktifİlan'] = IsYeri::where('is_active', 1)->count();

        //silinen ilanlar
        $data['AllKonutSilinen'] = Konut::where('deleted_at', '!=', null)->count();
        $data['AllArsaSilinen'] = Arsa::where('deleted_at', '!=', null)->count();
        $data['AllIsYeriSilinen'] = IsYeri::where('deleted_at', '!=', null)->count();

        // $data = IsYeri::all()->load('photos', 'ilan.user');
        return $data;
    }

    public function userDashboard($id)
    {
        $SystemUserid = JWTAuth::user()->id;

        if ($SystemUserid != $id) {
            return response()->json(['error' => 'Unauthorized', 'status' => 401], 401);
        }

        $data = [];

        $data['user'] = User::find($id);

        // $user = User::find($id);
        // $data['user'] = $user;

        // $data['userIlanCount'] = $user->ilans->count();

        // return $data;

        $IsYerisData = Ilan::where('user_id', $id)
            ->where('ilanable_type', IsYeri::class)
            ->join('is_yeris', 'ilans.ilanable_id', '=', 'is_yeris.id')
            ->select('is_yeris.is_active', DB::raw('count(*) as count'))
            ->groupBy('is_yeris.is_active')
            ->get();

        // Varsayılan olarak her iki durumu 0 kabul ediyoruz
        $resultKonut = [
            'active' => 0,
            'passive' => 0
        ];

        // Sorgu sonucuna göre değerleri güncelliyoruz
        foreach ($IsYerisData as $IsYeriData) {
            if ($IsYeriData->is_active == 1) {
                $resultKonut['active'] = $IsYeriData->count;
            } else {
                $resultKonut['passive'] = $IsYeriData->count;
            }
        }
        $data['IsYeriIlanCount'] = $resultKonut;


        $ArsasData = Ilan::where('user_id', $id)
            ->where('ilanable_type', Arsa::class) // Arsa modelini filtreliyoruz
            ->join('arsas', 'ilans.ilanable_id', '=', 'arsas.id') // 'arsas' tablosuna join yapıyoruz
            ->select('arsas.is_active', DB::raw('count(*) as count'))
            ->groupBy('arsas.is_active')
            ->get();

        // Varsayılan olarak her iki durumu 0 kabul ediyoruz
        $resultArsa = [
            'active' => 0,
            'passive' => 0
        ];

        // Sorgu sonucuna göre değerleri güncelliyoruz
        foreach ($ArsasData as $ArsaData) {
            if ($ArsaData->is_active == 1) {
                $resultArsa['active'] = $ArsaData->count;
            } else {
                $resultArsa['passive'] = $ArsaData->count;
            }
        }
        $data['ArsaIlanCount'] = $resultArsa;

        $KonutsData = Ilan::where('user_id', $id)
            ->where('ilanable_type', Konut::class) // Konut modelini filtreliyoruz
            ->join('konuts', 'ilans.ilanable_id', '=', 'konuts.id') // 'konuts' tablosuna join yapıyoruz
            ->select('konuts.is_active', DB::raw('count(*) as count'))
            ->groupBy('konuts.is_active')
            ->get();


        // Varsayılan olarak her iki durumu 0 kabul ediyoruz
        $resultKonut = [
            'active' => 0,
            'passive' => 0
        ];

        // Sorgu sonucuna göre değerleri güncelliyoruz
        foreach ($KonutsData as $KonutData) {
            if ($KonutData->is_active == 1) {
                $resultKonut['active'] = $KonutData->count;
            } else {
                $resultKonut['passive'] = $KonutData->count;
            }
        }

        $data['KonutIlanCount'] = $resultKonut;

        return $data;
    }
}
