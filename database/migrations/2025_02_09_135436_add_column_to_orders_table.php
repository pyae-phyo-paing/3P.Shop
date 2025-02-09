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
        Schema::table('orders', function (Blueprint $table) {
            $table->string('payment_method')->after('voucher_no');
            $table->string('category')->after('product_size');
            $table->string('brand')->after('category');
            $table->string('card_number')->nullable()->after('brand');
            $table->string('card_holder_name')->nullable()->after('card_number');
            $table->string('mobile_provider')->nullable()->after('card_holder_name');
            $table->string('payment_slip')->nullable()->change();
            $table->timestamp('order_accept_date')->nullable()->after('mobile_provider');
            $table->timestamp('order_shipping_date')->nullable()->after('order_accept_date');
            $table->timestamp('order_complete_date')->nullable()->after('order_shipping_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn('payment_method');
            $table->dropColumn('category');
            $table->dropColumn('brand');
            $table->dropColumn('card_number');
            $table->dropColumn('card_holder_name');
            $table->dropColumn('mobile_provider');
            $table->string('payment_slip')->nullable(false)->change();
            $table->dropColumn('order_accept_date');
            $table->dropColumn('order_shipping_date');
            $table->dropColumn('order_complete_date');
        });
    }
};
