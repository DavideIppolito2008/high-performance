<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('strength_standards', function (Blueprint $table) {
            $table->id();
            $table->string('exercise');
            $table->string('gender');
            $table->string('level');
            $table->integer('level_order')->default(0);
            $table->decimal('weight', 8, 2)->nullable();
            $table->decimal('ratio', 8, 3)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('strength_standards');
    }
};
