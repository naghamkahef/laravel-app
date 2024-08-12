<?php

namespace App\Http\Controllers;

use App\Http\Resources\CharacterResource;
use App\Models\Character;
use App\Models\Test;
use App\Models\Word;
use Illuminate\Http\Request;

class CharacterController extends Controller
{
    
    public function getCharacterData(Request $request)
    {
        $test = Test::find(1)->first();
        $char = $request->input('query');
        $character =  Character::with('test')->where('character', $char)->first();
        if(!$character){
            return response()->json([
                'message' => 'character is not found',
                'status' =>false
            ],404);

        }
        return response()->json([
            'data' =>  new CharacterResource($character),
            'status' => true
        ],200);
    }
}
