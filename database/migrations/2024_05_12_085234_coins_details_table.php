<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */

    public function up()
    {
        Schema::create('coins_details', function (Blueprint $table) {
            $table->id();
            $table->string('coin_id')->nullable();
            $table->string('symbol')->nullable();
            $table->string('name')->nullable();
            $table->string('image')->nullable();
            $table->decimal('current_price', 20, 10)->nullable();
            $table->bigInteger('market_cap')->nullable();
            $table->integer('market_cap_rank')->nullable();
            $table->decimal('fully_diluted_valuation', 20, 10)->nullable();
            $table->bigInteger('total_volume')->nullable();
            $table->decimal('high_24h', 20, 10)->nullable();
            $table->decimal('low_24h', 20, 10)->nullable();
            $table->decimal('price_change_24h', 20, 10)->nullable();
            $table->decimal('price_change_percentage_24h', 20, 10)->nullable();
            $table->bigInteger('market_cap_change_24h')->nullable();
            $table->decimal('market_cap_change_percentage_24h', 20, 10)->nullable();
            $table->decimal('circulating_supply', 20, 10)->nullable();
            $table->decimal('total_supply', 20, 10)->nullable();
            $table->decimal('max_supply', 20, 10)->nullable();
            $table->decimal('ath', 20, 10)->nullable();
            $table->decimal('ath_change_percentage', 20, 10)->nullable();
            $table->string('ath_date')->nullable();
            $table->decimal('atl', 20, 10)->nullable();
            $table->decimal('atl_change_percentage', 20, 10)->nullable();
            $table->string('atl_date')->nullable();
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
        Schema::dropIfExists('coins_details');
    }
};
