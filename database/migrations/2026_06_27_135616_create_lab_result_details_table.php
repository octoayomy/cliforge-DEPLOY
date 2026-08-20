<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('lab_result_details', function (Blueprint $table) {
            $table->id();

            $table->foreignId('lab_result_id')
                ->constrained('lab_results')
                ->cascadeOnDelete();

            $table->string('rule_name');
            $table->string('type')->nullable();
            $table->string('status', 20)->default('UNKNOWN');

            $table->text('expected')->nullable();
            $table->text('actual')->nullable();
            $table->integer('weight')->default(0);
            $table->text('description')->nullable();
            $table->text('command')->nullable();

            $table->timestamps();

            $table->index(['lab_result_id', 'status']);
            $table->index(['rule_name', 'status']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('lab_result_details');
    }
};