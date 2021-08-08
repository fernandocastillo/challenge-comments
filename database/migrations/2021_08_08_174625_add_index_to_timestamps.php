<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIndexToTimestamps extends Migration
{

    public function up()
    {
        Schema::table('comments', function (Blueprint $table) {
            $table->index(['created_at', 'updated_at']);
        });
    }

    public function down()
    {
        Schema::table('comments', function (Blueprint $table) {

        });
    }
}
