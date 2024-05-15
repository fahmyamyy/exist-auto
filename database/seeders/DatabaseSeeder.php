<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

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
            'password' => '$2y$10$s3XtgG4VWEJpWRQvyEEXUul8XQ5bIPIioXqNIj1qCJF13UBmQeT4C',
            'role' => 'ADMIN',
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString()
        ];

        $carTypeMaster = [
            ['type' => 'Sedan'],
            ['type' => 'Hatchback'],
            ['type' => 'MPV'],
            ['type' => 'SUV'],
            ['type' => 'Truk'],
            ['type' => 'Coupe'],
            ['type' => 'Van'],
            ['type' => 'Wagon'],
            ['type' => 'Mobil Atap Terbuka'],
        ];

        $carBrandMaster = [
            ['brand' => 'Toyota'],
            ['brand' => 'Honda'],
            ['brand' => 'Nissan'],
            ['brand' => 'Porsche'],
            ['brand' => 'Daihatsu'],
            ['brand' => 'Suzuki'],
            ['brand' => 'Audi'],
        ];

        $carModelMaster = [
            ['model' => 'Brio', 'car_brand_id' => 2, 'car_type_id' => 1],
            ['model' => 'Brio RS', 'car_brand_id' => 2, 'car_type_id' => 1],
            ['model' => 'Brio Satya', 'car_brand_id' => 2, 'car_type_id' => 1],
            ['model' => 'CR-V', 'car_brand_id' => 2, 'car_type_id' => 4],
            ['model' => 'CR-V Turbo', 'car_brand_id' => 2, 'car_type_id' => 4],
            ['model' => 'Supra', 'car_brand_id' => 1, 'car_type_id' => 1],
        ];

        DB::table('users')->insert($admin);
        DB::table('car_type')->insert($carTypeMaster);
        DB::table('car_brand')->insert($carBrandMaster);
        DB::table('car_model')->insert($carModelMaster);
    }
}
