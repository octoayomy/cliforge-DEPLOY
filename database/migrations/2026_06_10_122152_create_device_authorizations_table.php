<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('device_authorizations', function (Blueprint $table) {

            $table->id();

            $table->string('device_code')->unique();

            $table->unsignedBigInteger('user_id')->nullable();

            $table->string('hostname')->nullable();

            $table->string('device_hash')->nullable();

            $table->boolean('approved')->default(false);

            $table->timestamp('expires_at')->nullable();

            $table->timestamp('approved_at')->nullable();

            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('device_authorizations');
    }
};