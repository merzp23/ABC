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
        Schema::create('users', function (Blueprint $table) {
            $table->id()->autoIncrement(); // Đổi tên cột id thành MaNV
            $table->string('name', 255); // Thêm cột TenNV
            $table->string('email', 255)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password', 255);
            $table->string('CCCD', 12)->nullable()->unique(); // Thêm cột CCCD
            $table->date('NgaySinh')->nullable(); // Thêm cột NgaySinh
            $table->string('QueQuan', 30)->nullable(); // Thêm cột QueQuan
            $table->string('GioiTinh',3)->nullable(); // Thêm cột GioiTinh
            $table->string('ChucVu', 20)->nullable(); // Thêm cột ChucVu
            $table->string('PhongBan', 255)->nullable(); // Thêm cột PhongBan
            $table->rememberToken();
            $table->integer('is_verified')->default(0); // Thêm cột is_verified
            $table->integer('is_admin')->default(0); // Thêm cột is_admin
            $table->timestamps(); // Giữ nguyên created_at và updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
