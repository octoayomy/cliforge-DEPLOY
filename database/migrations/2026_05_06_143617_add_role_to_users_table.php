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
        if (! Schema::hasColumn('users', 'role')) {
            Schema::table('users', function (Blueprint $table) {
                $table->string('role', 20)
                    ->default('student')
                    ->after('password')
                    ->index();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        /*
         * Sengaja tidak menghapus kolom role karena kolom tersebut
         * kemungkinan sudah dibuat oleh migration CLIForge sebelumnya.
         */
    }
};