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
        Schema::table('order_product', function (Blueprint $table) {
            $table->decimal('price', 10, 2)->after('quantity'); 
            $table->decimal('discounted_price', 10, 2)->after('price'); 
        });
    }

    public function down()
    {
        Schema::table('order_product', function (Blueprint $table) {
            $table->dropColumn(['price', 'discounted_price']);
        });
    }
};
