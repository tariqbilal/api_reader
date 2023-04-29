<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoinListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coin_lists', function (Blueprint $table) {
            $table->id();
            $table->string('unique_id')->nullable();
            $table->string('symbol');
            $table->string('name');
			$table->foreignId('exchange_id')->index()->constrained()->cascadeOnDelete();
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
		Schema::table('coin_lists', function (Blueprint $table) {
			$table->dropForeign('coin_lists_exchange_id_foreign');
			$table->dropIndex('coin_lists_exchange_id_index');
			$table->dropColumn('exchange_id');
		});
		Schema::dropIfExists('coin_lists');
    }
}
