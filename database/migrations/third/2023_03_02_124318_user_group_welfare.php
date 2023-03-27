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
        Schema::create('users_groups_welfares', function (Blueprint $table) {
            $table->foreignId('group_welfare_id')->constrained('groups_welfares');
            $table->foreignId('user_id')->constrained('users');

            $table->primary(array('group_welfare_id', 'user_id'));
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('groups');
    }
};
