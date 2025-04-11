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
        Schema::create('sinh_viens', function (Blueprint $table) {
            $table->id();
            $table->string('ma_sv')->unique(); // Mã sinh viên
            $table->string('ten'); // Tên
            $table->string('lop'); // Lớp
            $table->float('diem_tb'); // Điểm trung bình
            $table->string('chuyen_nganh'); // Chuyên ngành
            $table->unsignedTinyInteger('ky_hoc'); // Kỳ học (1-6)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sinh_viens');
    }
};
