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
        Schema::table('payments', function (Blueprint $table) {
            $table->string('card_number')->nullable()->after('product_size');
            $table->string('card_holder_name')->nullable()->after('card_number');
            $table->string('mobile_provider')->nullable()->after('card_holder_name');
            $table->string('payment_slip')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('payments', function (Blueprint $table) {
            // Drop the column if migration is rolled back
            $table->dropColumn('card_number');
            $table->dropColumn('card_holder_name');
            $table->dropColumn('mobile_provider');
            $table->string('payment_slip')->nullable(false)->change();
        });
    }
};
