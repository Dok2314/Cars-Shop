<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    const TABLE_NAME = 'goods';

    public function up()
    {
        if(!Schema::hasTable(self::TABLE_NAME)) {
            Schema::create(self::TABLE_NAME, function (Blueprint $table){
               $table->id();
               $table->string('title');
               $table->string('slug');
               $table->foreignId('category_id')
                   ->constrained('categories')
                   ->cascadeOnUpdate()
                   ->cascadeOnDelete();
               $table->string('preview_image')->nullable();
               $table->string('gallery')->nullable();
               $table->text('description');
               $table->unsignedInteger('old_price');
               $table->unsignedInteger('new_price');
               $table->softDeletes();
               $table->timestamps();
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists(self::TABLE_NAME);
    }
};
