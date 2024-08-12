<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SoundSeedrer extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       
            DB::table('sounds')->insert([
                [
                    'id' => 1,
                    'sound' =>'sounds/automn.mp3'
                ],
                [
                    'id' => 2,
                    'sound' =>'sounds/spring.mp3'
                ],
                [
                    'id' => 3,
                    'sound' =>'sounds/summer.mp3'
                ],
                [
                    'id' => 4,
                    'sound' =>'sounds/winter.mp3'
                ]]);
        }
    }

