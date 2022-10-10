<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeoLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seo_links', function (Blueprint $table) {
            $table->id();
            $table->foreignId('seo_indexable_id');
            $table->enum('type',[
                'internal',
                'external',
                'void'
            ]);
            $table->text('inner_text');
            $table->text('url');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('seo_links');
    }
}
