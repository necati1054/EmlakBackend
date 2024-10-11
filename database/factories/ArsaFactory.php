<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Arsa>
 */
class ArsaFactory extends Factory
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
            'fiyat' => $this->faker->randomFloat(2, 10000, 1000000),
            'imar_durumu' => $this->faker->randomElement(['ada', 'a-Lejantlı', 'arazi', 'bahçe', 'depo', 'eğitim', 'enerji_depolama', 'konut', 'muhtelif', 'özel_kullanım', 'sağlık', 'sanayi', 'sera', 'sit_alanı', 'spor_alanı', 'tarla', 'ticari', 'toplu_konut', 'turizm', 'villa', 'zeytinlik']),
            'm2' => $this->faker->numberBetween(100, 5000),
            'ada_no' => $this->faker->word,
            'parsel_no' => $this->faker->word,
            'pafta_no' => $this->faker->optional()->word,
            'kaks' => $this->faker->optional()->randomFloat(2, 0.1, 3.0),
            'gabari' => $this->faker->optional()->randomFloat(2, 2.0, 20.0),
            'depozito' => $this->faker->optional()->randomFloat(2, 1000, 50000),
            'krediye_uygunluk' => $this->faker->boolean,
            'tapu_durumu' => $this->faker->randomElement(['hisseli_tapu', 'müstakil_tapulu', 'tahsis_tapu', 'zilliyet_tapu', 'yurt_dışı_tapulu', 'tapu_kaydı_yok']),
            'taşınmaz_numarası' => $this->faker->unique()->numerify('TN###'),
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
