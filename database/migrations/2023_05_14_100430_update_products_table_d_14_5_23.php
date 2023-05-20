<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateProductsTableD14523 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign('products_cate_id_foreign');
            $table->dropColumn('cate_id');
            $table->dropColumn('manufacturer_id');
            $table->dropColumn('origin_id');
            $table->string('origin')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
