<?php

namespace Database\Seeders;

use App\Models\Product;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = collect([
            [
                'user_id' => 100,
                'name' => 'Light Pants',
                'slug' => 'light-pants',
                'code' => "001",
                'quantity' => 10,
                'buying_price' => 900,
                'selling_price' => 1400,
                'quantity_alert' => 10,
                'tax' => 12,
                'tax_type' => 0,
                'notes' => null,
                'category_id' => 3,
                'unit_id' => 3,
                'product_image' => 'light-pants.jpg'
            ],
            [
                'user_id' => 100,
                'name' => 'Ragged Jeans',
                'slug' => 'ragged-jeans',
                'code' => "002",
                'quantity' => 10,
                'buying_price' => 900,
                'selling_price' => 1400,
                'quantity_alert' => 10,
                'tax' => 12,
                'tax_type' => 0,
                'notes' => null,
                'category_id' => 3,
                'unit_id' => 3,
                'product_image' => 'ragged-jeans.jpg'
            ],
            [
                'user_id' => 100,
                'name' => 'Pretty Garden',
                'slug' => 'pretty-garden',
                'code' => "003",
                'quantity' => 10,
                'buying_price' => 900,
                'selling_price' => 1400,
                'quantity_alert' => 10,
                'tax' => 12,
                'tax_type' => 0,
                'notes' => null,
                'category_id' => 2,
                'unit_id' => 3,
                'product_image' => 'pretty-garden.jpg'
            ],
            [
                'user_id' => 100,
                'name' => 'Drawstring Shorts',
                'slug' => 'drawstring-shorts',
                'code' => "004",
                'quantity' => 10,
                'buying_price' => 900,
                'selling_price' => 1400,
                'quantity_alert' => 10,
                'tax' => 12,
                'tax_type' => 0,
                'notes' => null,
                'category_id' => 4,
                'unit_id' => 3,
                'product_image' => 'drawstring-shorts.jpg'
            ],
            [
                'user_id' => 100,
                'name' => 'Denim Jacket',
                'slug' => 'denim-jacket',
                'code' => "005",
                'quantity' => 10,
                'buying_price' => 900,
                'selling_price' => 1400,
                'quantity_alert' => 10,
                'tax' => 12,
                'tax_type' => 0,
                'notes' => null,
                'category_id' => 5,
                'unit_id' => 3,
                'product_image' => 'denim-jacket.jpg'
            ]
        ]);

        $products->each(function ($product) {
            Product::create($product);
        });

        $products = collect([
            [
                'user_id' => 200,
                'name' => 'Longsleeves Cotton Shirt',
                'slug' => 'longsleeve-cotton',
                'code' => "006",
                'quantity' => 10,
                'buying_price' => 900,
                'selling_price' => 1400,
                'quantity_alert' => 10,
                'tax' => 12,
                'tax_type' => 0,
                'notes' => null,
                'category_id' => 1,
                'unit_id' => 3,
                'product_image' => 'blue-longsleeve.jpg'
            ],
            [
                'user_id' => 200,
                'name' => 'Lapel Shirt',
                'slug' => 'lapel-shirt',
                'code' => "007",
                'quantity' => 10,
                'buying_price' => 900,
                'selling_price' => 1400,
                'quantity_alert' => 10,
                'tax' => 12,
                'tax_type' => 0,
                'notes' => null,
                'category_id' => 1,
                'unit_id' => 3,
                'product_image' => 'lapel-shirt.jpg'
            ],
            [
                'user_id' => 200,
                'name' => 'Emoji Jacket',
                'slug' => 'emoji-jacket',
                'code' => "008",
                'quantity' => 10,
                'buying_price' => 900,
                'selling_price' => 1400,
                'quantity_alert' => 10,
                'tax' => 12,
                'tax_type' => 0,
                'notes' => null,
                'category_id' => 5,
                'unit_id' => 3,
                'product_image' => 'emoji-jacket.jpg'
            ]
        ]);

        $products->each(function ($product) {
            Product::create($product);
        });
    }
}
