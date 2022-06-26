<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    const TABLE_NAME = 'cars';

    public function up()
    {
        if(!Schema::hasTable(self::TABLE_NAME)) {
            Schema::create(self::TABLE_NAME, function (Blueprint $table){
                $table->id();
                $table->string('title');
                $table->string('mark')->nullable();
                $table->string('slug');
                $table->foreignId('category_id')
                    ->constrained('categories')
                    ->cascadeOnUpdate()
                    ->cascadeOnDelete();
                $table->string('preview_image')->nullable();
                $table->text('gallery')->nullable();
                $table->text('small_description')->nullable();
                $table->text('description');
                $table->unsignedInteger('old_price');
                $table->unsignedInteger('new_price')->nullable();
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
