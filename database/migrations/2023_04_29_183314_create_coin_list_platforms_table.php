<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoinListPlatformsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coin_list_platforms', function (Blueprint $table) {
	    	$table->id();
	    	$table->string('blockchain');
            $table->string('address');
			$table->foreignId('coin_list_id')->index()->constrained()->cascadeOnDelete();
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
		Schema::table('coin_list_platforms', function (Blueprint $table) {
			$table->dropForeign('coin_list_platforms_coin_list_id_foreign');
			$table->dropIndex('coin_list_platforms_coin_list_id_index');
			$table->dropColumn('coin_list_id');
		});
        Schema::dropIfExists('coin_list_platforms');
    }
}
