<?php

namespace Database\Seeders;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => 'أول الكلمة', 
        ]);
        Category::create([
            'name' => 'وسط الكلمة', 
        ]);
        Category::create([
            'name' => 'آخر الكلمة', 
        ]);
    }
}
