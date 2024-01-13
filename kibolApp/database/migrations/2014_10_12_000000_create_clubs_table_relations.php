<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class  extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('miedzlegnica', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();;
            $table->string('positive')->nullable();;
            $table->string('negative')->nullable();;
            $table->string('url_logo')->nullable();;
            $table->double('lat')->nullable();;
            $table->double('lng')->nullable();;
            $table->timestamps();
        });
        Schema::create('cracoviakrakow', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();;
            $table->string('positive')->nullable();;
            $table->string('negative')->nullable();;
            $table->string('url_logo')->nullable();;
            $table->double('lat')->nullable();;
            $table->double('lng')->nullable();;
            $table->timestamps();
        });
        Schema::create('gornikzabrze', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();;
            $table->string('positive')->nullable();;
            $table->string('negative')->nullable();;
            $table->string('url_logo')->nullable();;
            $table->double('lat')->nullable();;
            $table->double('lng')->nullable();;
            $table->timestamps();
        });
        Schema::create('jagielloniabialystok', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();;
            $table->string('positive')->nullable();;
            $table->string('negative')->nullable();;
            $table->string('url_logo')->nullable();;
            $table->double('lat')->nullable();;
            $table->double('lng')->nullable();;
            $table->timestamps();
        });
        Schema::create('koronakielce', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();;
            $table->string('positive')->nullable();;
            $table->string('negative')->nullable();;
            $table->string('url_logo')->nullable();;
            $table->double('lat')->nullable();;
            $table->double('lng')->nullable();;
            $table->timestamps();
        });
        Schema::create('lechpoznan', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();;
            $table->string('positive')->nullable();;
            $table->string('negative')->nullable();;
            $table->string('url_logo')->nullable();;
            $table->double('lat')->nullable();;
            $table->double('lng')->nullable();;
            $table->timestamps();
        });
        Schema::create('legiawarszawa', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();;
            $table->string('positive')->nullable();;
            $table->string('negative')->nullable();;
            $table->string('url_logo')->nullable();;
            $table->double('lat')->nullable();;
            $table->double('lng')->nullable();;
            $table->timestamps();
        });
        Schema::create('lkslodz', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();;
            $table->string('positive')->nullable();;
            $table->string('negative')->nullable();;
            $table->string('url_logo')->nullable();;
            $table->double('lat')->nullable();;
            $table->double('lng')->nullable();;
            $table->timestamps();
        });
        Schema::create('piastgliwice', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();;
            $table->string('positive')->nullable();;
            $table->string('negative')->nullable();;
            $table->string('url_logo')->nullable();;
            $table->double('lat')->nullable();;
            $table->double('lng')->nullable();;
            $table->timestamps();
        });
        Schema::create('pogonszczecin', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();;
            $table->string('positive')->nullable();;
            $table->string('negative')->nullable();;
            $table->string('url_logo')->nullable();;
            $table->double('lat')->nullable();;
            $table->double('lng')->nullable();;
            $table->timestamps();
        });
        Schema::create('puszczaniepolomice', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();;
            $table->string('positive')->nullable();;
            $table->string('negative')->nullable();;
            $table->string('url_logo')->nullable();;
            $table->double('lat')->nullable();;
            $table->double('lng')->nullable();;
            $table->timestamps();
        });
        Schema::create('radomiakradom', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();;
            $table->string('positive')->nullable();;
            $table->string('negative')->nullable();;
            $table->string('url_logo')->nullable();;
            $table->double('lat')->nullable();;
            $table->double('lng')->nullable();;
            $table->timestamps();
        });
        Schema::create('rakowczestochowa', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();;
            $table->string('positive')->nullable();;
            $table->string('negative')->nullable();;
            $table->string('url_logo')->nullable();;
            $table->double('lat')->nullable();;
            $table->double('lng')->nullable();;
            $table->timestamps();
        });
        Schema::create('ruchchorzow', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();;
            $table->string('positive')->nullable();;
            $table->string('negative')->nullable();;
            $table->string('url_logo')->nullable();;
            $table->double('lat')->nullable();;
            $table->double('lng')->nullable();;
            $table->timestamps();
        });
        Schema::create('stalmielec', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();;
            $table->string('positive')->nullable();;
            $table->string('negative')->nullable();;
            $table->string('url_logo')->nullable();;
            $table->double('lat')->nullable();;
            $table->double('lng')->nullable();;
            $table->timestamps();
        });
        Schema::create('slaskwroclaw', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();;
            $table->string('positive')->nullable();;
            $table->string('negative')->nullable();;
            $table->string('url_logo')->nullable();;
            $table->double('lat')->nullable();;
            $table->double('lng')->nullable();;
            $table->timestamps();
        });
        Schema::create('wartapoznan', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();;
            $table->string('positive')->nullable();;
            $table->string('negative')->nullable();;
            $table->string('url_logo')->nullable();;
            $table->double('lat')->nullable();;
            $table->double('lng')->nullable();;
            $table->timestamps();
        });
        Schema::create('widzewlodz', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();;
            $table->string('positive')->nullable();;
            $table->string('negative')->nullable();;
            $table->string('url_logo')->nullable();;
            $table->double('lat')->nullable();;
            $table->double('lng')->nullable();;
            $table->timestamps();
        });
        Schema::create('zaglebielubin', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();;
            $table->string('positive')->nullable();;
            $table->string('negative')->nullable();;
            $table->string('url_logo')->nullable();;
            $table->double('lat')->nullable();;
            $table->double('lng')->nullable();;
            $table->timestamps();
        });
        /* Pierwsza Liga  */
        Schema::create('arkagdynia', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();;
            $table->string('positive')->nullable();;
            $table->string('negative')->nullable();;
            $table->string('url_logo')->nullable();;
            $table->double('lat')->nullable();;
            $table->double('lng')->nullable();;
            $table->timestamps();
        });
        Schema::create('brukbettermalicanieciecza', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();;
            $table->string('positive')->nullable();;
            $table->string('negative')->nullable();;
            $table->string('url_logo')->nullable();;
            $table->double('lat')->nullable();;
            $table->double('lng')->nullable();;
            $table->timestamps();
        });
        Schema::create('chrobryglogow', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();;
            $table->string('positive')->nullable();;
            $table->string('negative')->nullable();;
            $table->string('url_logo')->nullable();;
            $table->double('lat')->nullable();;
            $table->double('lng')->nullable();;
            $table->timestamps();
        });
        Schema::create('gkskatowice', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();;
            $table->string('positive')->nullable();;
            $table->string('negative')->nullable();;
            $table->string('url_logo')->nullable();;
            $table->double('lat')->nullable();;
            $table->double('lng')->nullable();;
            $table->timestamps();
        });
        Schema::create('gkstychy', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();;
            $table->string('positive')->nullable();;
            $table->string('negative')->nullable();;
            $table->string('url_logo')->nullable();;
            $table->double('lat')->nullable();;
            $table->double('lng')->nullable();;
            $table->timestamps();
        });
        Schema::create('gornikleczna', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();;
            $table->string('positive')->nullable();;
            $table->string('negative')->nullable();;
            $table->string('url_logo')->nullable();;
            $table->double('lat')->nullable();;
            $table->double('lng')->nullable();;
            $table->timestamps();
        });
        Schema::create('lechiagdansk', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();;
            $table->string('positive')->nullable();;
            $table->string('negative')->nullable();;
            $table->string('url_logo')->nullable();;
            $table->double('lat')->nullable();;
            $table->double('lng')->nullable();;
            $table->timestamps();
        });
        Schema::create('motorlublin', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();;
            $table->string('positive')->nullable();;
            $table->string('negative')->nullable();;
            $table->string('url_logo')->nullable();;
            $table->double('lat')->nullable();;
            $table->double('lng')->nullable();;
            $table->timestamps();
        });
        Schema::create('odraopole', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();;
            $table->string('positive')->nullable();;
            $table->string('negative')->nullable();;
            $table->string('url_logo')->nullable();;
            $table->double('lat')->nullable();;
            $table->double('lng')->nullable();;
            $table->timestamps();
        });
        Schema::create('podbeskidziebielskobiala', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();;
            $table->string('positive')->nullable();;
            $table->string('negative')->nullable();;
            $table->string('url_logo')->nullable();;
            $table->double('lat')->nullable();;
            $table->double('lng')->nullable();;
            $table->timestamps();
        });
        Schema::create('poloniawarszawa', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();;
            $table->string('positive')->nullable();;
            $table->string('negative')->nullable();;
            $table->string('url_logo')->nullable();;
            $table->double('lat')->nullable();;
            $table->double('lng')->nullable();;
            $table->timestamps();
        });
        Schema::create('resoviarzeszow', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();;
            $table->string('positive')->nullable();;
            $table->string('negative')->nullable();;
            $table->string('url_logo')->nullable();;
            $table->double('lat')->nullable();;
            $table->double('lng')->nullable();;
            $table->timestamps();
        });

        Schema::create('stalrzeszow', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();;
            $table->string('positive')->nullable();;
            $table->string('negative')->nullable();;
            $table->string('url_logo')->nullable();;
            $table->double('lat')->nullable();;
            $table->double('lng')->nullable();;
            $table->timestamps();
        });
        Schema::create('wislakrakow', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();;
            $table->string('positive')->nullable();;
            $table->string('negative')->nullable();;
            $table->string('url_logo')->nullable();;
            $table->double('lat')->nullable();;
            $table->double('lng')->nullable();;
            $table->timestamps();
        });
        Schema::create('wislaplock', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();;
            $table->string('positive')->nullable();;
            $table->string('negative')->nullable();;
            $table->string('url_logo')->nullable();;
            $table->double('lat')->nullable();;
            $table->double('lng')->nullable();;
            $table->timestamps();
        });
        Schema::create('zaglebiesosnowiec', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();;
            $table->string('positive')->nullable();;
            $table->string('negative')->nullable();;
            $table->string('url_logo')->nullable();;
            $table->double('lat')->nullable();;
            $table->double('lng')->nullable();;
            $table->timestamps();
        });
        Schema::create('zniczpruszkow', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();;
            $table->string('positive')->nullable();;
            $table->string('negative')->nullable();;
            $table->string('url_logo')->nullable();;
            $table->double('lat')->nullable();;
            $table->double('lng')->nullable();;
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
        //  Schema::dropIfExists('clubs');
    }
};
