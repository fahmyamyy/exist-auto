<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UsersTableSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = [
            'id' => Str::uuid(),
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => '$2y$10$s3XtgG4VWEJpWRQvyEEXUul8XQ5bIPIioXqNIj1qCJF13UBmQeT4C',
            'role' => 'ADMIN',
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString()
        ];

        DB::table('users')->insert($admin);

    }
}
