<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->engine = "InnoDB";

            $table->increments('comp_id');
            $table->string('comp_name');
            $table->string('comp_email')->nullable()->unique();
            $table->string('comp_logo')->nullable();
            $table->string('comp_website')->nullable();
            $table->addColumn('tinyInteger', 'is_active', ['length' => 2, 'default' => '1']);
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
        Schema::dropIfExists('companies');
    }
}
