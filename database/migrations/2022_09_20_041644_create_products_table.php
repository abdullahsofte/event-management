<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('code', 18);
            $table->string('name', 100);
            $table->string('slug', 130);
            $table->foreignId('category_id')
                    ->constrained('categories')
                    ->onDelete('cascade');
            $table->foreignId('origin_id')->nullable() 
                    ->constrained('origins')
                    ->onDelete('cascade');  
            $table->foreignId('brand_id')->nullable() 
                    ->constrained('brands')
                    ->onDelete('cascade'); 
            $table->decimal('price', 18,2)->nullable();
            $table->text('image');
            $table->decimal('discount', 18,2)->nullable();
            $table->string('stock', 18)->nullable();
            $table->string('size', 100)->nullable();
            $table->text('short_details')->nullable();
            $table->longText('description')->nullable();
            $table->string('is_feature',1)->nullable();
            $table->string('is_offer',1)->nullable();
            $table->string('new_status',1)->nullable();
            $table->boolean('status')->default(true);
            $table->string('save_by', 3);
            $table->string('update_by', 3)->nullable();
            $table->string('ip_address', 15);
            $table->softDeletes();
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
        Schema::dropIfExists('products');
    }
}
