<?php

use App\Models\SiteConfig;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiteConfigsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('site_configs', function (Blueprint $table) {
            $table->id();
            $table->tinyText('director_word');
            $table->string('director_photo')->nullable();
            $table->string('director_name');
            $table->string('phone');
            $table->string('email');
            $table->string('address');
            $table->string('facebook')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('twitter')->nullable();
            $table->string('youtube')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        SiteConfig::create([
            'director_word' => 'Mot du directeur',
            'director_name' => 'Nom du DG de la BNAF',
            'phone' => '',
            'email' => '',
            'address' => '',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('site_configs');
    }
}
