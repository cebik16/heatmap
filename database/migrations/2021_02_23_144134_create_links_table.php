<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('links', function (Blueprint $table) {
            $table->id();
            $table->string('url');
            $table->string('type');
            $table->string('customer_id');
            $table->timestamps();
        });

        Schema::table('links', function(Blueprint $table)
        {
            $table->index('type');
            $table->index('url');
            $table->index('customer_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('link', function (Blueprint $table)
        {
            $table->dropIndex(['customer_id']);
            $table->dropIndex(['url']);
            $table->dropIndex(['type']);
        });

        Schema::dropIfExists('link');
    }
}
