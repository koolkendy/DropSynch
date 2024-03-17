<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = collect([
            [
                'id'    => 1,
                'name'  => 'Shirts',
                'slug'  => 'shirts'
            ],
            [
                'id'    => 2,
                'name'  => 'Dresses',
                'slug'  => 'dresses'
            ],
            [
                'id'    => 3,
                'name'  => 'Pants',
                'slug'  => 'pants'
            ],
            [
                'id'    => 4,
                'name'  => 'Shorts',
                'slug'  => 'shorts'
            ],
            [
                'id'    => 5,
                'name'  => 'Jackets',
                'slug'  => 'jackets'
            ]
        ]);

        $categories->each(function ($category) {
            Category::insert($category);
        });
    }
}
