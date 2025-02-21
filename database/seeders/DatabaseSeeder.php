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
        // Brand::factory(10)->create();
        // Category::factory(10)->create();
        // Product::factory(20)->create();
        // Payment::factory(20)->create();
        // Order::factory(20)->create();
        // // User::factory(10)->create();

        User::create([
            'name' => 'Super Admin',
            'phone' => '09250362841',
            'email' => 'leosurki3698@gmail.com',
            'password' => Hash::make('123456789'),
            'profile' => '/images/users/1739697826.png',
            'address' => 'Mandalay',
            'role' => 'Super Admin',
        ]);
        
    }
}
