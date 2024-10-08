<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('is_yeris', function (Blueprint $table) {
            $table->id();
            $table->string('ilan_basligi'); // String
            $table->text('açıklama'); // Text (Uzun açıklamalar için)
            $table->enum('teklif_tipi', ['satılık', 'kiralık']); // Enum (Seçenekli)
            $table->enum('taşınmaz_türü', ['atölye', 'avm', 'büfe', 'ofis', 'kafe', 'çiftlik', 'depo', 'dükkan', 'kıraathane', 'kumarhane']); // Enum (Seçenekli)
            $table->decimal('fiyat', 15, 2); // Decimal (Fiyat için virgüllü değer)
            $table->integer('m2'); // Integer
            $table->tinyInteger('bölüm_oda_sayisi'); // TinyInteger
            $table->integer('açık_alan_m2')->nullable(); // Integer, nullable olabilir
            $table->decimal('giriş_yüksekliği', 5, 2)->nullable(); // Decimal (Yükseklik için), nullable olabilir
            $table->integer('kapalı_alan_m2')->nullable(); // Integer, nullable olabilir
            $table->tinyInteger('oda_sayisi')->nullable(); // TinyInteger
            $table->enum('yapı_tipi', ['betonarme', 'çelik_konstrüksiyon', 'ahşap', 'yari_kagir', 'tam_kagir', 'taş ']); // Enum (Seçenekli)
            $table->enum('yapı_durumu', ['sıfır', 'ikinci_el']); // Enum (Seçenekli)
            $table->tinyInteger('kat_sayisi'); // TinyInteger
            $table->tinyInteger('bina_yaşı')->nullable(); // TinyInteger, nullable olabilir
            $table->decimal('aidat', 10, 2)->nullable(); // Decimal (Aidat için), nullable olabilir
            $table->enum('ısıtma', ['yok', 'soba', 'doğalgaz', 'kat_kaloriferi', 'merkezi', 'merkezi_(Pay Ölçer)', 'kombi_(Doğalgaz)', 'kombi_(Elektrik)', 'yerden_ısıtma', 'klima', 'fancoil_ünitesi', 'güneş_enerjisi', 'elektrikli_radyatör', 'jeotermal', 'şömine', 'VRV', 'ısı_pompası',]); // Enum (Seçenekli)
            $table->enum('yapının_durumu', ['sıfır', 'ikinci_el', 'inşaat_halinde', 'tarihi_eser']); // Enum (Seçenekli)
            $table->boolean('alkol_ruhsatı')->nullable(); // Boolean, nullable olabilir
            $table->tinyInteger('bulunduğu_kat'); // TinyInteger
            $table->tinyInteger('asansör_sayisi')->nullable(); // TinyInteger, nullable olabilir
            $table->boolean('kiracılı'); // Boolean
            $table->boolean('krediye_uygunluk'); // Boolean
            $table->enum('kullanım_durumu', ['boş', 'kiracılı', 'mülk_sahibi']); // Enum (Seçenekli)
            $table->boolean('zemin_etüdü')->nullable(); // Boolean
            $table->enum('tapu_durumu', ['kat_irtifakı', 'kat_mülkiyeti', 'hisseli_tapu', 'arsa_tapulu', 'kooperatif_hisseli_tapu', 'yurt_dışı_tapulu', 'tapu_kaydı_yok']); // Enum (Seçenekli)
            $table->string('taşınmaz_numarası'); // String
            $table->enum('durumu', ['sıfır', 'ikinci_el']); // Enum (Seçenekli)
            $table->boolean('takaslı')->nullable(); // Boolean
            $table->string('İl'); // String
            $table->string('İlçe'); // String
            $table->string('Mahalle'); // String
            $table->decimal('lat', 10, 8); // Decimal (Koordinatlar için)
            $table->decimal('lng', 11, 8); // Decimal (Koordinatlar için)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('is_yeris');
    }
};
