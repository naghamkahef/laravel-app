<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Level;  

class LevelSeeder extends Seeder
{
    public function run(): void
    {
        $ordinalNumbers = [
            'الأول', 'الثاني', 'الثالث','الرابع',  'الخامس', 'السادس', 'السابع','الثامن', 'التاسع',
            'العاشر','الحادي عشر',
            'الثاني عشر', 'الثالث عشر', 'الرابع عشر','الخامس عشر','السادس عشر',
            'السابع عشر','الثامن عشر',  'التاسع عشر', 'العشرون','الحادي والعشرون','الثاني والعشرون',
            'الثالث والعشرون','الرابع والعشرون', 'الخامس والعشرون', 'السادس والعشرون',   'السابع والعشرون','الثامن والعشرون',
            
        ];

        foreach ($ordinalNumbers as $ordinal) {
            Level::create([
                'name' => $ordinal,
            ]);
        }
    }
}


