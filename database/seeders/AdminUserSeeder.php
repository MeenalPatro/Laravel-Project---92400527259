<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use RuntimeException;

class AdminUserSeeder extends Seeder
{
    private const DEFAULT_ADMIN_EMAIL = 'admin@domainbloom.local';
    private const DEFAULT_ADMIN_PASSWORD = 'BloomAdmin!2026';

    public function run(): void
    {
        $name = trim((string) env('ADMIN_NAME'));
        $email = Str::lower(trim((string) env('ADMIN_EMAIL')));
        $password = (string) env('ADMIN_PASSWORD');

        if ($name === '' || !filter_var($email, FILTER_VALIDATE_EMAIL) || strlen($password) < 12) {
            throw new RuntimeException('Set ADMIN_NAME, ADMIN_EMAIL, and a 12+ character ADMIN_PASSWORD in .env before seeding the first administrator.');
        }

        if (($email === self::DEFAULT_ADMIN_EMAIL || hash_equals(self::DEFAULT_ADMIN_PASSWORD, $password)) && !app()->environment('local')) {
            throw new RuntimeException('The bundled development administrator credentials can only be used in the local environment. Set unique credentials before seeding elsewhere.');
        }

        $existing = User::where('email', $email)->first();
        if ($existing) {
            if ($existing->isAdmin()) return;
            throw new RuntimeException('The administrator email already belongs to a regular user. Use a separate administrator email.');
        }

        User::forceCreate([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
            'role' => 'admin',
            'is_active' => true,
        ]);
    }
}
