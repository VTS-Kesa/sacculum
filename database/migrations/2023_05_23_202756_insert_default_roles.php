<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Insert the default roles
        DB::table('roles')->insert([
            ['slug' => 'admin', 'name' => 'Administrator', 'created_at' => now(), 'updated_at' => now()],
            ['slug' => 'user', 'name' => 'User', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Delete the default roles
        DB::table('roles')->whereIn('slug', ['admin', 'user'])->delete();
    }
};
