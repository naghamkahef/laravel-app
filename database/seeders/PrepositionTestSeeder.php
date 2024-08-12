<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PrepositionTestSeeder extends Seeder
{
    public function run()
    {
        DB::table('preposition_tests')->insert([
            [
                'sentence' => 'يخاف الطفل ___ العنكبوت',
                'preposition_name' => 'من',
                
                'image' => 'images/prepTest/spider.jpg',
                'sound' =>'sounds/prepTest/mntestone.mp3'
            ],
            [
                'sentence' => 'يسبح الأطفال ___ المسبح',
                'preposition_name' => 'في',
                
                'image' => 'images/prepTest/swim.jpg',
                'sound' =>'sounds/prepTest/fetest.mp3'
            ],
            [
                'sentence' => 'تعزف الطفلة ___ الكمان',
                'preposition_name' => 'على',
                
                'image' => 'images/prepTest/play.jpg',
                'sound' =>'sounds/prepTest/alaatest.mp3'
            ],
            [
                'sentence' => 'سقط الطفل ___ الدراجة',
                'preposition_name' => 'عن',
               
                'image' => 'images/prepTest/bike.jpg',
                'sound' =>'sounds/prepTest/aantest.mp3'
            ],
            [
                'sentence' => 'يذهب الأطفال ___ حديقة الألعاب',
                'preposition_name' => 'إلى',
                
                'image' => 'images/prepTest/childrens.jpg',
                'sound' =>'sounds/prepTest/elatest.mp3'
            ],
        ]);
    }
}
