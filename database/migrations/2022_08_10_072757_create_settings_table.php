<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('logo')->default('logo.png');
            $table->string('site_title')->default('Laravel');
            $table->text('description')->nullable();
            $table->string('about_us')->nullable();
            $table->string('facebook_link')->default('https://facebook.com');
            $table->string('twitter_link')->default('https://twitter.com');
            $table->string('github_link')->default('https://github.com');
            $table->string('feed_link')->default('https://feed.com');
            $table->string('email')->default('blog@blog.com');
            $table->string('copyright_text')->default('Copyright © 2022 All rights reserved ');
            $table->boolean('author_bio')->default(1);
            $table->boolean('popular_post')->default(1);
            $table->boolean('category')->default(1);
            $table->boolean('tags')->default(1);
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
        Schema::dropIfExists('settings');
    }
}
