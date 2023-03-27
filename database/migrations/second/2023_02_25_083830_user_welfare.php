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
        //
        Schema::create('users_welfares', function(Blueprint $table) {
            $table->id();
            $table->tinyInteger('status')->default(0);
            $table->date('create_date');
            $table->date('hr_approve_date')->nullable();
            $table->json('bill');
            $table->json('item');
            $table->json('price');
            $table->text('note')->nullable();
            $table->foreignId('hr_approver_id')->nullable()->constrained('users');
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('welfare_id')->constrained('welfares');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('user_welfare');

    }
};
