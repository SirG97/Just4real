<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDescriptionToProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {

            $table->integer('warehouse_id')->after('id');
            $table->integer('weight')->default(0)->change();
            $table->string('description')->nullable();
            $table->string('photo')->nullable();
            $table->integer('stock')->default(0);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('warehouse_id');
            $table->dropColumn('description');
            $table->dropColumn('photo');
            $table->dropColumn('stock');
        });
    }
}
