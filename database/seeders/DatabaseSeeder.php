<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        Product::truncate();
        
        $products = [
            ['name' => 'Lipstick', 'description' => 'Long lasting lipstick', 'price' => 25.99, 'stock' => 50, 'image' => '/images/lipstick.jpg'],
            ['name' => 'Foundation', 'description' => 'Full coverage foundation', 'price' => 45.99, 'stock' => 30, 'image' => '/images/foundation.jpg'],
            ['name' => 'Mascara', 'description' => 'Volumizing mascara', 'price' => 19.99, 'stock' => 60, 'image' => '/images/mascara.jpg'],
            ['name' => 'Eyeshadow Palette', 'description' => 'Colorful eyeshadow palette', 'price' => 35.99, 'stock' => 25, 'image' => '/images/eyeshadows.jpg'],
            ['name' => 'Blush', 'description' => 'Natural looking blush', 'price' => 22.99, 'stock' => 40, 'image' => '/images/Blush.jpg'],
            ['name' => 'Contour', 'description' => 'Sculpt and define your face', 'price' => 28.99, 'stock' => 35, 'image' => '/images/contour.jpg'],
            ['name' => 'Eyeliner', 'description' => 'Precise and long lasting', 'price' => 15.99, 'stock' => 70, 'image' => '/images/eyeliner.jpg'],
            ['name' => 'Lip Liner', 'description' => 'Define your lips perfectly', 'price' => 12.99, 'stock' => 55, 'image' => '/images/lipliner.jpg'],
            ['name' => 'Powder', 'description' => 'Smooth finishing powder', 'price' => 18.99, 'stock' => 45, 'image' => '/images/powder.jpg'],
            ['name' => 'Primer', 'description' => 'Perfect makeup base', 'price' => 32.99, 'stock' => 38, 'image' => '/images/primer.jpg'],
            ['name' => 'Makeup Brushes', 'description' => 'Professional brush set', 'price' => 49.99, 'stock' => 20, 'image' => '/images/brushes.jpg'],
            ['name' => 'Setting Spray', 'description' => 'Long lasting setting spray', 'price' => 24.99, 'stock' => 42, 'image' => '/images/spray.jpg'],
            ['name' => 'Brow Gel', 'description' => 'Define and hold your brows', 'price' => 14.99, 'stock' => 50, 'image' => '/images/browgel.jpg'],
            ['name' => 'Eyebrow Pencil', 'description' => 'Precise eyebrow pencil', 'price' => 11.99, 'stock' => 60, 'image' => '/images/eyebrowpencil.jpg'],
            ['name' => 'Concealer', 'description' => 'Full coverage concealer', 'price' => 21.99, 'stock' => 48, 'image' => '/images/concealer.jpg'],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}