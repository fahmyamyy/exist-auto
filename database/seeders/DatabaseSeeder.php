<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $admin = [
            'id' => Str::uuid(),
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('123'),
            // 'password' => '$2y$10$s3XtgG4VWEJpWRQvyEEXUul8XQ5bIPIioXqNIj1qCJF13UBmQeT4C',
            'role' => 'ADMIN',
            'tanggal_lahir' => '2024-06-26',
            'tempat_lahir' => 'ADMIN',
            'umur' => 1,
            'agama' => 'Lainnya',
            'no_telp' => 0123,
            'luas_lahan' => 0123,
            'status_perkawinan' => 'Menikah',
            'status_keanggotaan' => 'Pengurus',
            'penghasilan_perbulan' => 2000000,
            'penghasilan_panen' => 50000000,
            'status_pinjaman' => 'Baru',
            'pinjaman_sebelumnya' => 'Lancar',
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString()
        ];

        $user = [
            'id' => Str::uuid(),
            'name' => 'Fahmy Malik',
            'email' => 'fahmy.malikk@gmail.com',
            'password' => Hash::make('123'),
            'role' => 'USER',
            'tanggal_lahir' => '2024-06-26',
            'tempat_lahir' => 'ACEH',
            'umur' => 1,
            'agama' => 'Islam',
            'no_telp' => 0123,
            'luas_lahan' => 0123,
            'status_perkawinan' => 'Menikah',
            'status_keanggotaan' => 'Pengurus',
            'penghasilan_perbulan' => 2000000,
            'penghasilan_panen' => 50000000,
            'status_pinjaman' => 'Baru',
            'pinjaman_sebelumnya' => 'Lancar',
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString()
        ];

        $userTest = [
            'id' => Str::uuid(),
            'name' => 'Suwanto',
            'email' => 'wanto@gmail.com',
            'password' => Hash::make('123'),
            'role' => 'USER',
            'tanggal_lahir' => '2024-06-26',
            'tempat_lahir' => 'ACEH',
            'umur' => 54,
            'agama' => 'Lainnya',
            'no_telp' => 0123,
            'luas_lahan' => 4,
            'status_perkawinan' => 'Menikah',
            'status_keanggotaan' => 'Pengurus',
            'penghasilan_perbulan' => 5000000,
            'penghasilan_panen' => 160000000,
            'status_pinjaman' => 'Baru',
            'pinjaman_sebelumnya' => 'Macet',
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString()
        ];
        DB::table('users')->insert($admin);
        DB::table('users')->insert($user);
        DB::table('users')->insert($userTest);
    }
}
