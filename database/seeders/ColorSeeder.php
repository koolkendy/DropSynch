<?php

namespace Database\Seeders;

use App\Models\Color;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $units = collect([
            [
                'name' => 'Red',
                'slug' => 'red',
                'short_code' => 'red'
            ],
            [
                'name' => 'Orange',
                'slug' => 'orange',
                'short_code' => 'orange'
            ],
            [
                'name' => 'Yellow',
                'slug' => 'yellow',
                'short_code' => 'yellow'
            ],
            [
                'name' => 'Green',
                'slug' => 'green',
                'short_code' => 'green'
            ],
            [
                'name' => 'Blue',
                'slug' => 'blue',
                'short_code' => 'blue'
            ],
            [
                'name' => 'Indigo',
                'slug' => 'indigo',
                'short_code' => 'indigo'
            ],
            [
                'name' => 'Violet',
                'slug' => 'violet',
                'short_code' => 'violet'
            ],
            [
                'name' => 'Pink',
                'slug' => 'pink',
                'short_code' => 'pink'
            ],
            [
                'name' => 'Black',
                'slug' => 'black',
                'short_code' => 'black'
            ],
            [
                'name' => 'White',
                'slug' => 'white',
                'short_code' => 'white'
            ],
        ]);

        $units->each(function ($color) {
            Color::insert($color);
        });
    }
}
