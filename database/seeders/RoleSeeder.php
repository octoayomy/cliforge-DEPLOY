<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Promote the oldest registered account as admin.
     * Every other account keeps the default student role.
     */
    public function run(): void
    {
        $admin = User::query()
            ->oldest('id')
            ->first();

        if (! $admin) {
            $this->command?->warn('Belum ada user. RoleSeeder tidak mengubah data.');
            return;
        }

        $admin->forceFill([
            'role' => 'admin',
        ])->save();

        User::query()
            ->where('id', '!=', $admin->getKey())
            ->whereNotIn('role', ['admin', 'student'])
            ->update(['role' => 'student']);

        $this->command?->info(
            "Admin CLIForge: {$admin->name} <{$admin->email}>"
        );
    }
}
