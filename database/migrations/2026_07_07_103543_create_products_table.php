<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            // Relationships
            $table->foreignId('category_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('brand_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();

            // Product Info
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('sku')->unique();

            // Description
            $table->text('short_description')->nullable();
            $table->longText('description');

            // Pricing
            $table->decimal('cost_price', 10, 2)->default(0);
            $table->decimal('selling_price', 10, 2);
            $table->decimal('discount_price', 10, 2)->nullable();

            $table->decimal('weight', 10, 3)->nullable();
            $table->enum('unit', [
                'pcs',
                'kg',
                'g',
                'ltr',
                'ml',
                'box',
                'pack'
            ])->default('pcs');
            $table->boolean('track_quantity')->default(true);

            // Inventory
            $table->unsignedInteger('stock')->default(0);
            $table->unsignedInteger('minimum_stock')->default(5);

            // Image
            $table->string('thumbnail')->nullable();

            // SEO
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();

            // Status
            $table->boolean('featured')->default(false);
            $table->boolean('status')->default(true);

            $table->unsignedInteger('view_count')->default(0);
            $table->unsignedInteger('sort_order')->default(0);

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
