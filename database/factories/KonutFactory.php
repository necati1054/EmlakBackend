<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Konut>
 */
class KonutFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'ilan_basligi' => $this->faker->sentence(3),
            'açıklama' => $this->faker->paragraph,
            'teklif_tipi' => $this->faker->randomElement(['satılık', 'kiralık']),
            'taşınmaz_türü' => $this->faker->randomElement(['daire', 'rezidans', 'müstakil_ev', 'villa', 'çiftlik_evi', 'köşk_konak', 'yalı', 'yalı_dairesi', 'yazlık', 'kooperatif']),
            'fiyat' => $this->faker->randomFloat(2, 10000, 5000000),
            'm2_brüt' => $this->faker->numberBetween(50, 500),
            'm2_net' => $this->faker->numberBetween(40, 400),
            'açık_alan_m2' => $this->faker->optional()->numberBetween(10, 100),
            'arazi_m2' => $this->faker->optional()->numberBetween(100, 1000),
            'oda_sayisi' => $this->faker->numberBetween(1, 10),
            'salon_sayisi' => $this->faker->optional()->numberBetween(1, 3),
            'bina_yaşı' => $this->faker->optional()->numberBetween(1, 50),
            'kat_sayisi' => $this->faker->numberBetween(1, 20),
            'bulunduğu_kat' => $this->faker->numberBetween(1, 20),
            'ısıtma' => $this->faker->randomElement(['yok', 'soba', 'doğalgaz', 'kat_kaloriferi', 'merkezi', 'merkezi_(Pay Ölçer)', 'kombi_(Doğalgaz)', 'kombi_(Elektrik)', 'yerden_ısıtma', 'klima', 'fancoil_ünitesi', 'güneş_enerjisi', 'elektrikli_radyatör', 'jeotermal', 'şömine', 'VRV', 'ısı_pompası']),
            'yapı_tipi' => $this->faker->randomElement(['betonarme', 'çelik_konstrüksiyon', 'ahşap', 'yari_kagir', 'tam_kagir', 'taş']),
            'banyo_sayisi' => $this->faker->numberBetween(1, 5),
            'balkon' => $this->faker->optional()->boolean,
            'yapının_durumu' => $this->faker->randomElement(['sıfır', 'ikinci_el', 'inşaat_halinde', 'tarihi_eser']),
            'asansör' => $this->faker->optional()->boolean,
            'otopark' => $this->faker->optional()->boolean,
            'eşyalı' => $this->faker->optional()->boolean,
            'kullanım_durumu' => $this->faker->randomElement(['boş', 'kiracılı', 'mülk_sahibi']),
            'aidat' => $this->faker->optional()->randomFloat(2, 50, 500),
            'krediye_uygun' => $this->faker->boolean,
            'zemin_etüdü' => $this->faker->optional()->boolean,
            'tapu_durumu' => $this->faker->randomElement(['kat_irtifakı', 'kat_mülkiyeti', 'hisseli_tapu', 'arsa_tapulu', 'kooperatif_hisseli_tapu', 'yurt_dışı_tapulu', 'tapu_kaydı_yok']),
            'taşınmaz_numarası' => $this->faker->unique()->numerify('TN###'),
            'takaslı' => $this->faker->optional()->boolean,
            'İl' => $this->faker->city,
            'İlçe' => $this->faker->city,
            'Mahalle' => $this->faker->streetAddress,
            'lat' => $this->faker->latitude,
            'lng' => $this->faker->longitude,
            'is_active' => $this->faker->boolean(90), // %90 aktif olma ihtimali
        ];
    }
}
