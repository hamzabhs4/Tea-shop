<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Thé Vert',
                'description' => 'Collection de thés verts raffinés',
                'is_active' => true,
            ],
            [
                'name' => 'Thé Noir',
                'description' => 'Thés noirs robustes et aromatiques',
                'is_active' => true,
            ],
            [
                'name' => 'Thé Blanc',
                'description' => 'Thés blancs délicats et subtils',
                'is_active' => true,
            ],
            [
                'name' => 'Tisanes',
                'description' => 'Tisanes et infusions naturelles',
                'is_active' => true,
            ],
            [
                'name' => 'Accessoires',
                'description' => 'Accessoires pour la préparation du thé',
                'is_active' => true,
            ],
        ];

        foreach ($categories as $category) {
            Category::create([
                'name' => $category['name'],
                'slug' => Str::slug($category['name']),
                'description' => $category['description'],
                'is_active' => $category['is_active'],
            ]);
        }
    }
}
