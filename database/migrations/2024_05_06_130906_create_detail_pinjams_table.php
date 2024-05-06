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
        Schema::create('detail_pinjams', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('pinjam_buku_id')->unsigned();
            $table->bigInteger('book_id')->unsigned();
            $table->enum('status', ['pinjam', 'kembali']);
            $table->date('tanggal_pinjam');
            $table->date('tanggal_kembali');
            $table->timestamps();
        });
        Schema::table('detail_pinjams', function (Blueprint $table) {
            $table->foreign('pinjam_buku_id')->references('id')->on('pinjam_bukus')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('book_id')->references('id')->on('books')->onUpdate('cascade')->onDelete('cascade');
  
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('detail_pinjams', function (Blueprint $table) {
            $table->dropForeign('detail_pinjams_book_id_foreign');
        });

        Schema::table('detail_pinjams', function (Blueprint $table) {
            $table->dropIndex('detail_pinjams_pinjam_bukus_id_foreign');
        });

        Schema::dropIfExists('detail_pinjams');
    }
};
