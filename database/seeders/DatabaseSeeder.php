<?php

namespace Database\Seeders;


use App\Database\Seeders\WordsTableSeeder;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            
            CharacterSeeder::class,
            PrepositionSeeder::class,
            PrepositionTestSeeder::class,
            TestSeeder::class,
            SoundSeedrer::class,
            
        ]);
    }
  }
        
        
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        //$this->call(WordsTableSeeder::class);
     
    

