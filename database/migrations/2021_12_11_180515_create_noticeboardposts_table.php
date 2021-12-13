<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNoticeboardpostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('noticeboardposts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('building_code')->constrained('buildings');
            $table->foreignId('user_id')->nullable()->constrained('users');
            $table->string('title');
            $table->string('subject');
            $table->string('body');
            $table->timestamp('published_at');
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
        Schema::dropIfExists('noticeboardposts');
    }
}
