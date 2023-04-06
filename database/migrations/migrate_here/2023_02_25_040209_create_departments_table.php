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
        Schema::create('departments', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });

        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });

        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('fname');
            $table->string('lname');
            $table->string('email')->unique();
            $table->string('password');
            $table->char('type');
            $table->foreignId('role_id')->constrained();
            $table->foreignId('department_id')->constrained();
            $table->rememberToken();
        });

        Schema::create('welfares', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->char('type');
            $table->string('detail')->nullable();
            $table->decimal('budget', 8, 2);
            $table->foreignId('creator_id')->constrained('users');
        });

        Schema::create('users_welfares', function(Blueprint $table) {
            $table->id();
            $table->tinyInteger('status')->default(0);
            $table->date('create_date');
            $table->date('hr_approve_date')->nullable();
            $table->json('bill');
            $table->json('item');
            $table->json('price');
            $table->decimal('total_price', 8, 2);
            $table->decimal('welfare_budget', 8, 2);
            $table->string('welfare_name');
            $table->text('note')->nullable();
            $table->date('cancel_date')->nullable();
            $table->foreignId('hr_approver_id')->nullable()->constrained('users');
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('welfare_id')->constrained('welfares');
        });

        Schema::create('groups_welfares', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('status')->default(0);
            $table->date('create_date');
            $table->date('hr_approve_date')->nullable();
            $table->date('head_approve_date')->nullable();
            $table->decimal('total_price', 8, 2);
            $table->decimal('welfare_budget', 8, 2);
            $table->string('welfare_name');
            $table->text('note')->nullable();
            $table->date('cancel_date')->nullable();
            $table->foreignId('hr_approver_id')->nullable()->constrained('users');
            $table->foreignId('head_approver_id')->nullable()->constrained('users');
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('welfare_id')->constrained('welfares');
        });

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
        Schema::dropIfExists('departments');
    }
};
