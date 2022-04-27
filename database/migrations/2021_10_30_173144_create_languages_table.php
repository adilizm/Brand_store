<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLanguagesTable extends Migration
{
    protected $connection = 'mysql';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql')->create('languages', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->char('key',2)->unique();
            $table->boolean('is_RTL')->default(0);
            $table->boolean('is_default')->default(0);
            $table->string('image');
            $table->integer('number_users')->default(0);
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
        Schema::connection('mysql')->dropIfExists('languages');
    }
}
