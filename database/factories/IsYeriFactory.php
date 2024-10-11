<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Isyeri>
 */
class IsYeriFactory extends Factory
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
            'taşınmaz_türü' => $this->faker->randomElement(['atölye', 'avm', 'büfe', 'ofis', 'kafe', 'çiftlik', 'depo', 'dükkan', 'kıraathane', 'kumarhane']),
            'fiyat' => $this->faker->randomFloat(2, 10000, 1000000),
            'm2' => $this->faker->numberBetween(50, 500),
            'bölüm_oda_sayisi' => $this->faker->numberBetween(1, 10),
            'açık_alan_m2' => $this->faker->optional()->numberBetween(0, 200),
            'giriş_yüksekliği' => $this->faker->optional()->randomFloat(2, 2.5, 5),
            'kapalı_alan_m2' => $this->faker->optional()->numberBetween(0, 500),
            'oda_sayisi' => $this->faker->optional()->numberBetween(1, 10),
            'yapı_tipi' => $this->faker->randomElement(['betonarme', 'çelik_konstrüksiyon', 'ahşap', 'yari_kagir', 'tam_kagir', 'taş']),
            'yapı_durumu' => $this->faker->randomElement(['sıfır', 'ikinci_el']),
            'kat_sayisi' => $this->faker->numberBetween(1, 20),
            'bina_yaşı' => $this->faker->optional()->numberBetween(1, 50),
            'aidat' => $this->faker->optional()->randomFloat(2, 100, 5000),
            'ısıtma' => $this->faker->randomElement(['yok', 'soba', 'doğalgaz', 'kat_kaloriferi', 'merkezi', 'merkezi_(Pay Ölçer)', 'kombi_(Doğalgaz)', 'kombi_(Elektrik)', 'yerden_ısıtma', 'klima', 'fancoil_ünitesi', 'güneş_enerjisi', 'elektrikli_radyatör', 'jeotermal', 'şömine', 'VRV', 'ısı_pompası']),
            'yapının_durumu' => $this->faker->randomElement(['sıfır', 'ikinci_el', 'inşaat_halinde', 'tarihi_eser']),
            'alkol_ruhsatı' => $this->faker->optional()->boolean,
            'bulunduğu_kat' => $this->faker->numberBetween(1, 20),
            'asansör_sayisi' => $this->faker->optional()->numberBetween(0, 5),
            'kiracılı' => $this->faker->boolean,
            'krediye_uygunluk' => $this->faker->boolean,
            'kullanım_durumu' => $this->faker->randomElement(['boş', 'kiracılı', 'mülk_sahibi']),
            'zemin_etüdü' => $this->faker->optional()->boolean,
            'tapu_durumu' => $this->faker->randomElement(['kat_irtifakı', 'kat_mülkiyeti', 'hisseli_tapu', 'arsa_tapulu', 'kooperatif_hisseli_tapu', 'yurt_dışı_tapulu', 'tapu_kaydı_yok']),
            'taşınmaz_numarası' => $this->faker->unique()->numerify('TN###'),
            'durumu' => $this->faker->randomElement(['sıfır', 'ikinci_el']),
            'takaslı' => $this->faker->optional()->boolean,
            'İl' => $this->faker->city,
            'İlçe' => $this->faker->city,
            'Mahalle' => $this->faker->word,
            'lat' => $this->faker->latitude,
            'lng' => $this->faker->longitude,
            'is_active' => $this->faker->boolean(90), // %90 aktif olma ihtimali
        ];
    }
}
