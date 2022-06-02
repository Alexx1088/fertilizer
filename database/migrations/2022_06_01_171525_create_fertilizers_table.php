<?php

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
        Schema::create('fertilizers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->decimal('nitrogen_rate');
            $table->decimal('phosphorus_rate');
            $table->decimal('potassium_rate');
            $table->unsignedBigInteger('culture_group');
            $table->string('district');
            $table->decimal('price');
            $table->string('description');
            $table->string('destination');
            $table->timestamps();

            $table->index('culture_group', 'fertilizer_culture_group_idx');

            $table->foreign('culture_group', 'fertilizer_culture_group_fk')
                ->on('cultures')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fertilizers');
    }
};
