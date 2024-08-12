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
        $characers = [
            'أ', "ب", 'ت', 'ث', 'ج', 'ح', 'خ', 'د', 'ذ', 'ر', 'ز',
            'س', 'ش', 'ص', 'ض', 'ط', 'ظ', 'ع', 'غ', 'ف', 'ق', 'ك',
            "ل", 'م', 'ن', 'ه', 'و', 'ي'
        ];
        $arabicMiddleCharacters = [
            'ألف وسط الكلمة', "باء وسط الكلمة", 'تاء وسط الكلمة', 'ثاء وسط الكلمة', 'جيم وسط الكلمة', 'حاء وسط الكلمة',
            'خاء وسط الكلمة', 'دال وسط الكلمة', 'ذال وسط الكلمة', 'راء وسط الكلمة', 'زاي وسط الكلمة',
            'سين وسط الكلمة', 'شين وسط الكلمة', 'صاد وسط الكلمة', 'ضاد وسط الكلمة', 'طه وسط الكلمة', 'ظه وسط الكلمة',
            'عين وسط الكلمة', 'غين وسط الكلمة',
            'فاء وسط الكلمة', 'قاف وسط الكلمة', 'كاف وسط الكلمة',
            "لام وسط الكلمة", 'ميم وسط الكلمة', 'نون وسط الكلمة', 'هاء وسط الكلمة', 'واو وسط الكلمة', 'ياء وسط الكلمة'
        ];
        $arabicLastCharacters = [
            'ألف اخر الكلمة', "باء اخر الكلمة", 'تاء اخر الكلمة', 'ثاء اخر الكلمة', 'جيم اخر الكلمة', 'حاء اخر الكلمة',
            'خاء اخر الكلمة', 'دال اخر الكلمة', 'ذال اخر الكلمة', 'راء اخر الكلمة', 'زاي اخر الكلمة',
            'سين اخر الكلمة', 'شين اخر الكلمة', 'صاد اخر الكلمة', 'ضاد اخر الكلمة', 'طه اخر الكلمة', 'ظه اخر الكلمة', 'عين اخر الكلمة', 'غين اخر الكلمة',
            'فاء اخر الكلمة', 'قاف اخر الكلمة', 'كاف اخر الكلمة',
            "لام اخر الكلمة", 'ميم اخر الكلمة', 'نون اخر الكلمة', 'هاء اخر الكلمة', 'واو اخر الكلمة', 'ياء اخر الكلمة'
        ];

        // Insert characters using DB facade

        foreach ($characers as $character) {
            Character::create([
                'name' => $character,
                //'level_id' => $levelCount,
                //'category_id' => 1,
                'character' =>mb_substr($character, 0, 1),
                'Char_first' => "storage/images/characters/Char_first/$character.png",
                'word_first' => "storage/images/characters/word_first/$character.png",
                'image_first' => "storage/images/characters/image_first/$character.png",
                'canvas_first' => "storage/images/characters/canvas_first/$character.jpg",
                'sound_first'=>"storage/sounds/sound-first/$character.mp3",
                'Char_middle' => "storage/images/characters/Char_middle/$character.png",
                'word_middle' => "storage/images/characters/word_middle/$character.png",
                'image_middle' => "storage/images/characters/image_middle/$character.png",
                'canvas_middle' => "storage/images/characters/canvas_middle/$character.jpg",
                'sound_middle'=>"storage/sounds/sound-middle/$character.mp3",
                'Char_last' => "storage/images/characters/Char_last/$character.png",
                'word_last' => "storage/images/characters/word_last/$character.png",
                'image_last' => "storage/images/characters/image_last/$character.png",
                'canvas_last' => "storage/images/characters/canvas_last/$character.jpg",
                'sound_last' =>"storage/sounds/sound-last/$character.mp3",
                'sound_test1' =>"storage/sounds/test1/$character.mp3",
                'sound_test2' =>"storage/sounds/test2/$character.mp3"
            ]);
        }
    }
}
