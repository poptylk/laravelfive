<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->primary('id');
            $table->char('id', 32);       //md5
            $table->char('cat', 8)        //文章類型
                  ->nullable();
            $table->string('name');       //文章名稱
            $table->text('content');      //文章內容
            $table->string('img');        //文章圖(列表)
            $table->date('release_date'); //發佈日期
            $table->boolean('is_top')     //熱門文章
                  ->default(0);
            $table->integer('sort');      //排序
            $table->boolean('status')     //狀態
                  ->default(0);
            $table->string('title');      //SEO標題
            $table->text('keywords');     //SEO關鍵字
            $table->text('description');  //SEO簡述
            $table->string('slug');       //SEO美化搜尋
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
        Schema::drop('posts');
    }
}
