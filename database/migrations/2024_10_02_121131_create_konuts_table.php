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
        Schema::create('konuts', function (Blueprint $table) {
            $table->id();
            $table->string('ilan_basligi'); // String
            $table->text('açıklama'); // Uzun açıklamalar için text
            $table->enum('teklif_tipi', ['satılık', 'kiralık']); // Enum (Seçenekli)
            $table->enum('taşınmaz_türü', ['daire', 'rezidans', 'müstakil_ev', 'villa', 'çiftlik_evi', 'köşk_konak', 'yalı', 'yalı_dairesi', 'yazlık', 'kooperatif']); // Enum (Seçenekli)
            $table->decimal('fiyat', 15, 2); // Decimal (Fiyat için virgüllü değer)
            $table->integer('m2_brüt'); // Integer
            $table->integer('m2_net'); // Integer
            $table->integer('açık_alan_m2')->nullable(); // Integer, nullable olabilir
            $table->integer('arazi_m2')->nullable(); // Integer, nullable olabilir
            $table->tinyInteger('oda_sayisi'); // Küçük Integer
            $table->tinyInteger('salon_sayisi')->nullable(); // Nullable TinyInteger
            $table->tinyInteger('bina_yaşı')->nullable(); // Nullable TinyInteger
            $table->tinyInteger('kat_sayisi'); // TinyInteger
            $table->tinyInteger('bulunduğu_kat'); // TinyInteger
            $table->enum('ısıtma', ['yok', 'soba', 'doğalgaz', 'kat_kaloriferi', 'merkezi', 'merkezi_(Pay Ölçer)', 'kombi_(Doğalgaz)', 'kombi_(Elektrik)', 'yerden_ısıtma', 'klima', 'fancoil_ünitesi', 'güneş_enerjisi', 'elektrikli_radyatör', 'jeotermal', 'şömine', 'VRV', 'ısı_pompası',]); // Enum (Seçenekli)
            $table->enum('yapı_tipi', ['betonarme', 'çelik_konstrüksiyon', 'ahşap', 'yari_kagir', 'tam_kagir', 'taş ']); // Enum (Seçenekli)
            $table->tinyInteger('banyo_sayisi'); // TinyInteger
            $table->boolean('balkon')->nullable(); // Boolean (Var/yok)
            $table->enum('yapının_durumu', ['sıfır', 'ikinci_el', 'inşaat_halinde', 'tarihi_eser']); // Enum (Seçenekli)
            $table->boolean('asansör')->nullable(); // Boolean
            $table->boolean('otopark')->nullable(); // Boolean
            $table->boolean('eşyalı')->nullable(); // Boolean
            $table->enum('kullanım_durumu', ['boş', 'kiracılı', 'mülk_sahibi']); // Enum (Seçenekli)
            $table->decimal('aidat', 10, 2)->nullable(); // Decimal (Aidat için)
            $table->boolean('krediye_uygun'); // Boolean
            $table->boolean('zemin_etüdü')->nullable(); // Boolean
            $table->enum('tapu_durumu', ['kat_irtifakı', 'kat_mülkiyeti', 'hisseli_tapu', 'arsa_tapulu', 'kooperatif_hisseli_tapu', 'yurt_dışı_tapulu', 'tapu_kaydı_yok']); // Enum (Seçenekli)
            $table->string('taşınmaz_numarası'); // String
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
        Schema::dropIfExists('konuts');
    }
};
