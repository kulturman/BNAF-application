<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToReports extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reports', function (Blueprint $table) {
            $table->string('nip')->fillable();
            $table->string('region')->fillable();
            $table->string('province')->fillable();
            $table->string('commune')->fillable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('reports', function (Blueprint $table) {
            $table->dropColumn('nip');
            $table->dropColumn('region');
            $table->dropColumn('province');
            $table->dropColumn('commune');
        });
    }
}
