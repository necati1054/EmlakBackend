<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Arsa;
use App\Models\IsYeri;
use App\Models\Konut;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function homePage()
    {
        $DataKonut = Konut::orderBy('created_at', 'desc')->take(4)->get()->load('firstPhoto');
        $DataIsyeri = IsYeri::orderBy('created_at', 'desc')->take(4)->get()->load('firstPhoto');;
        $DataArsa = Arsa::orderBy('created_at', 'desc')->take(4)->get()->load('firstPhoto');;

        return response()->json([
            'konut' => $DataKonut,
            'isyeri' => $DataIsyeri,
            'arsa' => $DataArsa
        ]);
    }
}
