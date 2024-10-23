<?php

namespace Database\Seeders;

use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $user = User::factory()->create([
            'username' => 'username',
        ]);

        $this->call([PostSeeder::class]);
        $this->call([OrderSeeder::class]);

        $user->todos()->createMany([
            ['name' => 'Wash my bike', 'position' => 0],
            ['name' => 'Jump on the trampoline', 'position' => 1],
            ['name' => 'Burn ants with glass', 'position' => 2],
            ['name' => 'Put a card in my spokes', 'position' => 3],
        ]);

//        [ $today, $tomorrow ] = $user->cards()->createMany([
//            [ 'name' => 'Today I\'m gonna...' ],
//            [ 'name' => 'Tomorrow I\'m gonna...' ],
//        ]);
//
//        $today->todos()->createMany([
//            [ 'name' => 'Wash my bike' ],
//            [ 'name' => 'Jump on the trampoline' ],
//            [ 'name' => 'Burn ants with glass' ],
//            [ 'name' => 'Put a card in my spokes' ],
//        ]);
//
//        $tomorrow->todos()->createMany([
//            [ 'name' => 'Build a skate ramp' ],
//            [ 'name' => 'Dig a giant hole' ],
//            [ 'name' => 'Buy a cap gun' ],
//        ]);
    }
}
