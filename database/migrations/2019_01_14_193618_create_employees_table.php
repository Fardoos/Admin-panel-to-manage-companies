<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->increments('emp_id');
            $table->string('emp_first_name');
            $table->string('emp_last_name');
            $table->string('emp_email')->nullable()->unique();
            $table->string('emp_phone', 45)->nullable();
            $table->integer('comp_id')->unsigned()->nullable();
            $table->addColumn('tinyInteger', 'is_active', ['length' => 2, 'default' => '1']);
            $table->foreign('comp_id')
                ->references('comp_id')->on('companies')
                ->onDelete('cascade')
                ->onUpdate('cascade');
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
        Schema::dropIfExists('employees');
    }
}
