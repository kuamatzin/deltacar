<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToOrdenesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ordenes', function (Blueprint $table) {
            $table->text('adicional_costo')->after('adicional');
            $table->text('adicional_cantidad')->after('adicional');
            $table->text('servicio_costo')->after('servicio');
            $table->text('servicio_cantidad')->after('servicio');
            $table->text('servicio_nombre')->after('servicio');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ordenes', function (Blueprint $table) {
            $table->dropColumn(['adicional_costo', 'adicional_cantidad', 'servicio_costo', 'servicio_nombre', 'servicio_cantidad']);
        });
    }
}
