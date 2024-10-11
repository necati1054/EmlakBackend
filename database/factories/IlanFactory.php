<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Konut;
use App\Models\IsYeri;
use App\Models\Arsa;
use App\Models\Ilan;
use Illuminate\Database\Eloquent\Factories\Factory;

class IlanFactory extends Factory
{
    protected $model = Ilan::class;

    public function definition()
    {
        // Kullanıcıları al (admin hariç)
        $users = User::where('id', '>', 1)->get(); // 1. kullanıcı admin, diğerleri

        $userProperties = []; // Boş bir dizi oluşturun

        foreach ($users as $user) {
            // Kullanıcının ID'sine göre ilanları al
            $arsalar = Arsa::where('id', $user->id)->first();
            $konutlar = Konut::where('id', $user->id)->first();
            $isYerleri = IsYeri::where('id', $user->id)->first();

            // Eğer ilan varsa ekle
            if ($arsalar) {
                $userProperties[] = [
                    'user_id' => $user->id,
                    'ilanable_id' => $arsalar->id,
                    'ilanable_type' => Arsa::class,
                ];
            }

            if ($konutlar) {
                $userProperties[] = [
                    'user_id' => $user->id,
                    'ilanable_id' => $konutlar->id,
                    'ilanable_type' => Konut::class,
                ];
            }

            if ($isYerleri) {
                $userProperties[] = [
                    'user_id' => $user->id,
                    'ilanable_id' => $isYerleri->id,
                    'ilanable_type' => IsYeri::class,
                ];
            }
        }

        return $userProperties; // Diziyi döndürün
    }
}
