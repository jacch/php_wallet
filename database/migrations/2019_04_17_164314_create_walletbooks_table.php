<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWalletbooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('walletbooks', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->string('comment');
          $table->integer('price');
          $table->string('paytype');
          $table->date('paydate');
          $table->integer('pay_checked')->default(0);
          $table->timestamp('created_at')->nullable();
          $table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('walletbooks');
    }
}
