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
        Schema::create('group_welfare', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->tinyInteger('status');
            $table->date('create_date');
            $table->date('hr_approve_date');
            $table->date('head_approve_date');
            $table->text('note');
            $table->string('hr_approver_id');
            $table->string('head_approver_id');
            $table->string('user_id');
            $table->foreignId('welfare_id')->constrained();

            $table->foreign('hr_approver_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('head_approver_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('group_welfare');
    }
};
