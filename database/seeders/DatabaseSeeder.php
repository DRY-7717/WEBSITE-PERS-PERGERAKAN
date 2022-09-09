<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(100)->create();
        Post::factory(100)->create();

        Category::create([
            'name' => 'Technology',
            'slug' => 'technology'
        ]);
        Category::create([
            'name' => 'Sport',
            'slug' => 'sport'
        ]);
        Category::create([
            'name' => 'Automotive',
            'slug' => 'automotive'
        ]);
        Category::create([
            'name' => 'Food',
            'slug' => 'food'
        ]);
        Category::create([
            'name' => 'Education',
            'slug' => 'education'
        ]);
        Category::create([
            'name' => 'Finance',
            'slug' => 'finance'
        ]);
        Category::create([
            'name' => 'Politic',
            'slug' => 'politic'
        ]);
        Category::create([
            'name' => 'Entertaiment',
            'slug' => 'entertaiment'
        ]);
        Category::create([
            'name' => 'Travel',
            'slug' => 'travel'
        ]);
        Category::create([
            'name' => 'Health',
            'slug' => 'health'
        ]);
        User::create([
            'name' => "Pers Pergerakan",
            'email' => "pmiicabangciputatofficial@gmail.com",
            'username' => "perspergerakan",
            'role' => 1,
            'komisariat' => "PC. PMII Ciputat",
            'alamat' => "Jl. Ibnu Sina I, Pisangan, Kec. Ciputat Tim., Kota Tangerang Selatan, Banten 15419",
            'ttl' => '20 Februari 1960',
            'password' => Hash::make('password')
        ]);
    }

}
