<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Product;
use App\Models\Category;
use App\Models\User;

class CheckData extends Command
{
    protected $signature = 'check:data';
    protected $description = 'Vérifier les données dans la base';

    public function handle()
    {
        $this->info('=== Vérification des données ===');
        
        $this->info('\nProduits :');
        $products = Product::all();
        foreach ($products as $product) {
            $this->line("- {$product->name} (ID: {$product->id})");
        }

        $this->info('\nCatégories :');
        $categories = Category::all();
        foreach ($categories as $category) {
            $this->line("- {$category->name} (ID: {$category->id})");
        }

        $this->info('\nUtilisateurs :');
        $users = User::all();
        foreach ($users as $user) {
            $this->line("- {$user->name} (ID: {$user->id}, Admin: {$user->is_admin})");
        }
    }
} 