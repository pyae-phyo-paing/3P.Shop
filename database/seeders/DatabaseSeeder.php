<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Product;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory()->create([
        //     'name' => ['Test','Min'],
        //     'email' => ['test@example.com','min@gmail.com'],
        //     'password' =>Hash::make(['1234567','123456789']),
        // ]);
        Brand::factory(10)->create();
        Category::factory(10)->create();
        Product::factory(150)->create();
        Payment::factory(100)->create();
        Order::factory(100)->create();
        // User::factory(10)->create();

        
    }
}
