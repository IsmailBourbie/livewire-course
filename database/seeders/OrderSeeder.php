<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Product;
use App\Models\Store;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userOne = User::query()->firstOrFail();
        $storeOne = Store::factory()->createOne(['user_id' => $userOne]);
        $products = Product::factory(4)->create(['store_id' => $storeOne]);
        Order::factory(1995)->create(['store_id' => $storeOne, 'product_id' => $products->random()]);

        $userTwo = User::factory()->create(['username' => 'ismailbourbie']);
        $storeTwo = Store::factory()->createOne(['user_id' => $userTwo]);
        $products = Product::factory()->count(4)->create(['store_id' => $storeTwo]);
        Order::factory(10)->create(['store_id' => $storeTwo, 'product_id' => $products->random()]);
    }
}
