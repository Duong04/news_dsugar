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
        Schema::create('role_permission_actions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('role_permission_id');
            $table->unsignedBigInteger('action_id');

            $table->foreign('role_permission_id')->references('id')->on('role_permissions')->onDelete('cascade');
            $table->foreign('action_id')->references('id')->on('permission_actions')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('role_permission_actions');
    }
};
