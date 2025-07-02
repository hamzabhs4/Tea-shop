<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name' => 'Earl Grey Classic',
                'description' => 'Un thé noir parfumé à la bergamote, classique et raffiné.',
                'price' => 15.99,
                'category_name' => 'Thé Noir',
                'stock' => 50,
                'is_featured' => true,
                'is_active' => true,
            ],
            [
                'name' => 'Sencha Premium',
                'description' => 'Thé vert japonais de haute qualité, fraîche et délicate.',
                'price' => 22.50,
                'category_name' => 'Thé Vert',
                'stock' => 30,
                'is_featured' => true,
                'is_active' => true,
            ],
            [
                'name' => 'Thé Blanc Pai Mu Tan',
                'description' => 'Thé blanc chinois aux notes subtiles et florales.',
                'price' => 35.00,
                'category_name' => 'Thé Blanc',
                'stock' => 20,
                'is_featured' => false,
                'is_active' => true,
            ],
            [
                'name' => 'Tisane Camomille',
                'description' => 'Infusion relaxante de camomille naturelle.',
                'price' => 12.99,
                'category_name' => 'Tisanes',
                'stock' => 40,
                'is_featured' => false,
                'is_active' => true,
            ],
            [
                'name' => 'Théière en Céramique',
                'description' => 'Belle théière artisanale en céramique pour une dégustation parfaite.',
                'price' => 45.00,
                'category_name' => 'Accessoires',
                'stock' => 15,
                'is_featured' => true,
                'is_active' => true,
            ],
        ];

        foreach ($products as $productData) {
            $category = Category::where('name', $productData['category_name'])->first();
            
            Product::create([
                'name' => $productData['name'],
                'slug' => Str::slug($productData['name']),
                'description' => $productData['description'],
                'price' => $productData['price'],
                'category_id' => $category->id,
                'stock' => $productData['stock'],
                'image' => 'products/default-product.jpg', // Placeholder image
                'is_featured' => $productData['is_featured'],
                'is_active' => $productData['is_active'],
            ]);
        }
    }
}
