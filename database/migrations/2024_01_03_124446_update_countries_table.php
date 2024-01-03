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
        Schema::table('countries', function (Blueprint $table) {
            // add column 'is_active' 'owner_id' 'content'
            $table->boolean('is_active')->default(false);
            $table->foreignId('owner_id')->nullable()->constrained('users');
            $table->longText('content')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('countries', function (Blueprint $table) {
            // drop column 'is_active' 'owner_id' 'content'
            $table->dropColumn('is_active');
            $table->dropForeign(['owner_id']);
            $table->dropColumn('owner_id');
            $table->dropColumn('content');
        });
    }
};
