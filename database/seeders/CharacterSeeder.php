<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Character;

class CharacterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $arabicCharacters = [
            'ألف', "باء", 'تاء', 'ثاء', 'جيم', 'حاء', 'خاء', 'دال', 'ذال', 'راء', 'زاي',
            'سين', 'شين', 'صاد', 'ضاد', 'طه', 'ظه', 'عين', 'غين', 'فاء', 'قاف', 'كاف',
           "لام", 'ميم', 'نون', 'هاء', 'واو', 'ياء'
        ];

        // Insert characters using DB facade
        $levelCount = 1;
        foreach ($arabicCharacters as $character) {
            Character::create([
                'name' => $character,
                'level_id' => $levelCount,
                'category_id' => 1,
            ]);

            $levelCount++;
            if ($levelCount > 28) {
                $levelCount = 1; // Reset level count if it exceeds 28
            }
        }

        $levelCount = 1;
        foreach ($arabicCharacters as $character) {
            Character::create([
                'name' => $character,
                'level_id' => $levelCount,
                'category_id' => 2,
            ]);

            $levelCount++;
            if ($levelCount > 28) {
                $levelCount = 1; // Reset level count if it exceeds 28
            }
        }

        $levelCount = 1;
        foreach ($arabicCharacters as $character) {
            Character::create([
                'name' => $character,
                'level_id' => $levelCount,
                'category_id' => 3,
            ]);

            $levelCount++;
            if ($levelCount > 28) {
                $levelCount = 1; // Reset level count if it exceeds 28
            }
        }


    }}