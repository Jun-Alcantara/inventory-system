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
        Schema::create('equipments', function (Blueprint $table) {
            $table->id();
            $table->string('asset_number');
            $table->string('serial_number');
            $table->unsignedBigInteger('equipment_type_id');
            $table->string('manufacturer');
            $table->string('year_model');
            $table->longText('description')->nullable();
            $table->unsignedBigInteger('equipment_department_id');
            $table->unsignedBigInteger('equipment_status_id')
                ->default(1);
            $table->unsignedBigInteger('created_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipments');
    }
};
