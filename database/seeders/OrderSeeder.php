<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Product;
use App\Models\Store;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $store = Store::factory()->create();
        $products = Product::factory()->count(50)->create(['store_id' => $store]);
        $orders = Order::factory(40)->create(['store_id' => $store, 'product_id' => $products->random()]);
    }
}
