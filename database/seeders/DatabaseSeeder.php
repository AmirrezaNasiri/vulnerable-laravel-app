<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();

        \App\Models\Product::factory(20)->create();
        \App\Models\Product::factory()->create([
            'name' => 'hardware-cryptocurrency-wallet'
        ]);

        \App\Models\Product::factory(10)->create([
            'name' => 'test-'.Str::replace(' ', '-', fake()->words(3, true)),
        ]);
    }
}
