<?php

namespace Database\Seeders;

use App\Models\Unit;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $units = collect([
            [
                'name' => 'Extra Small',
                'slug' => 'extra-small',
                'short_code' => 'XS'
            ],
            [
                'name' => 'Small',
                'slug' => 'small',
                'short_code' => 'S'
            ],
            [
                'name' => 'Medium',
                'slug' => 'medium',
                'short_code' => 'M'
            ],
            [
                'name' => 'Large',
                'slug' => 'large',
                'short_code' => 'L'
            ],
            [
                'name' => 'Extra Large',
                'slug' => 'extra-large',
                'short_code' => 'XL'
            ]
        ]);

        $units->each(function ($unit) {
            Unit::insert($unit);
        });
    }
}
