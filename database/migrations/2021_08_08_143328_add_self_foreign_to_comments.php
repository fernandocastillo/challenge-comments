<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSelfForeignToComments extends Migration
{

    public function up()
    {
        Schema::table('comments', function (Blueprint $table) {
            $table->char('parent_id', 36)->nullable()->after('id');
            $table->foreign('parent_id')->references('id')->on('comments');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('comments', function (Blueprint $table) {
            //
            $table->dropForeign('comments_parent_id_foreign');
            $table->dropColumn('parent_id');
        });
    }
}
