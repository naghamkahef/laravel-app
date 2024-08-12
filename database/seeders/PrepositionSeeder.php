<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class PrepositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('prepositions')->insert([
            [
                'name' => 'إلى',
                'sentence' => 'يذهب الفلاح إلى الحقل',
                
                'image' => 'images/farmer.jpg',
                'sound' => 'sounds/prepLearn/ela.mp3',
                
            ],
            [
                'name' => 'في',
                'sentence' => 'يعيش العصفور في العش ',
               
                'image' => 'images/bired.jpg',
                'sound' => 'sounds/prepLearn/fe.mp3',
                
            ],
            [
                'name' => 'على',
                'sentence' => ' ينام الطفل على السرير',
                
                'image' => 'images/bed.jpg',
                'sound' => 'sounds/prepLearn/alaa.mp3',
               
            ],
            [
                'name' => 'من',
                'sentence' => 'نشتري الخضار من البائع',
               
                'image' => 'images/vigitables.jpg',
                'sound' => 'sounds/prepLearn/mn.mp3',
               
            ],
            [
                'name' => 'عن',
                'sentence' => 'تتساقط الأوراق عن الأشجار',
                
                'image' => 'images/tree.jpg',
                'sound' => 'sounds/prepLearn/aan.mp3',
               
            ],
        ]);
    }
}
