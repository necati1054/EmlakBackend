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
        Schema::create('arsas', function (Blueprint $table) {
            $table->id();
            $table->string('ilan_basligi'); // String
            $table->text('açıklama'); // Text (Uzun açıklamalar için)
            $table->enum('teklif_tipi', ['satılık', 'kiralık']); // Enum (Seçenekli)
            $table->decimal('fiyat', 15, 2); // Decimal (Fiyat için virgüllü değer)
            $table->enum('imar_durumu', ['ada', 'a-Lejantlı', 'arazi', 'bahçe', 'depo ', 'eğitim', 'enerji_depolama', 'konut', 'muhtelif', 'özel_kullanım', 'sağlık', 'sanayi', 'sera', 'sit_alanı', 'spor_alanı', 'tarla', 'ticari', 'toplu_konut', 'turizm', 'villa', 'zeytinlik']); // Enum (Seçenekli)
            $table->integer('m2'); // Integer
            $table->string('ada_no'); // String
            $table->string('parsel_no'); // String
            $table->string('pafta_no')->nullable(); // String (Pafta numarası opsiyonel olabilir)
            $table->decimal('kaks', 5, 2)->nullable(); // Decimal (KAKS, koordine artış katsayısı), nullable olabilir
            $table->decimal('gabari', 5, 2)->nullable(); // Decimal (Gabari, yükseklik sınırı), nullable olabilir
            $table->decimal('depozito', 15, 2)->nullable(); // Decimal (Depozito), nullable olabilir
            $table->boolean('krediye_uygunluk'); // Boolean
            $table->enum('tapu_durumu', ['hisseli_tapu', 'müstakil_tapulu', 'tahsis_tapu', 'zilliyet_tapu', 'yurt_dışı_tapulu', 'tapu_kaydı_yok']); // Enum (Seçenekli)
            $table->string('taşınmaz_numarası'); // String
            $table->boolean('takaslı')->nullable(); // Boolean, nullable olabilir
            $table->string('İl'); // String
            $table->string('İlçe'); // String
            $table->string('Mahalle'); // String
            $table->decimal('lat', 10, 8); // Decimal (Koordinatlar için)
            $table->decimal('lng', 11, 8); // Decimal (Koordinatlar için)
            $table->boolean('is_active')->default(true); // Boolean
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('arsas');
    }
};
