<?php

use App\Models\v1\MicroDistrict;
use App\Models\v1\Orient;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rent_apartments', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(MicroDistrict::class)->nullable();
            $table->foreignIdFor(Orient::class)->nullable();
            $table->integer('price');
            $table->integer('num_rooms');
            $table->enum('type',["jer jay","ko\'p qavatli uy"])->default("ko\'p qavatli uy");
            $table->text('description');
            $table->string('phone');
            $table->string('telegram')->nullable();
            $table->double('latitude')->nullable();
            $table->double('longitude')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rent_apartments');
    }
};
