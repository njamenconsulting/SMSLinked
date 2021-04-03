<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->string('contact_firstname',255);
          $table->string('contact_lastname',255)->nullable();
          $table->string('contact_phone1',10)->unique();
          $table->string('contact_email',255)->unique();
          $table->enum('contact_campus',['bangangte','douala','yaounde']);
          //Add foreign key
          $table->unsignedBigInteger('group_id');
          $table->foreign('group_id')
                ->references('id')
                ->on('groups')
                ->onDelete('restrict')
                ->onUpdate('restrict');
          //
          $table->string('created_by');
          $table->string('updated_by')->nullable();
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
        Schema::dropIfExists('contacts');
    }
}
