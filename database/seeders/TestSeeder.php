<?php

namespace Database\Seeders;

use App\Models\Character;
use App\Models\Test;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            'أ' => 'باب',
            'ب' => 'بيانو',
            'ت' => 'تاج',
            'ث' => 'تمثال',
            'ج' => 'درج',
            'ح' => 'حصان',
            'خ' => 'نخيل',
            'د' => 'منطاد',
            'ذ' => 'ذهب',
            'ر' => 'منشار',
            'ز' => 'زهرة',
            'س' => 'سيارة',
            'ش' => 'منشار',
            'ص' => 'صبار',
            'ض' => 'مضرب',
            'ط' => 'مطر',
            'ظ' => 'مظلة',
            'ع' => 'عين',
            'غ' => 'دماغ',
            'ف' => 'فأر',
            'ق' => 'مقص',
            'ك' => 'سمك',
            'ل' => 'ملعقة',
            'م' => 'لحم',
            'ن' => 'نهر',
            'ه' => 'وجه',
            'و' => 'موز',
            'ي' => 'يد',

        ];
        foreach($data as $char => $word){
            //$test
            Character::where('character',$char)->first()->test()->save(new Test([
                'word' => $word,
                'image' => "storage/images/test/$word.png"

            ]));
        }
        

        
    }
}
