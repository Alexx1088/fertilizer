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
        Schema::table('fertilizers', function (Blueprint $table) {

            $table->dropIndex('fertilizer_culture_group_idx');
            $table->dropColumn('culture_group');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

            Schema::table('fertilizers', function (Blueprint $table) {
                $table->unsignedBigInteger('culture_group_id');
                $table->foreign('culture_group_id', 'fertilizer_culture_group_id_fk')
                    ->on('cultures')->references('id'); /*link*/

        });
    }
};
