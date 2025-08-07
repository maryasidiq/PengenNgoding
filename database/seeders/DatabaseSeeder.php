<?php

namespace Database\Seeders;

use App\Models\artikelContentModel;
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
        // User::factory(10)->create();
        $this->call([
            TestimonialSeeder::class,
            clientSeeder::class,
            PortfolioSeeder::class,
            PortfolioScreenshotSeeder::class,
            ArtikelSeeder::class,
            ArtikelContentSeeder::class,
            TipsSeeder::class,
            TipsContentSeeder::class,
            VideoSeeder::class,
            VideoContentSeeder::class,


        ]);
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
