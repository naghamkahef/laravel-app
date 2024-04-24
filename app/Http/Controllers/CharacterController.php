<?php
namespace App\Http\Controllers;
use App\Models\Character;
use App\Models\Word;
use Illuminate\Http\Request;

class CharacterController extends Controller
{
    public function show($id)
    {
        $character = Character::find($id);

        if (!$character) {
            return response()->json(['message' => 'Character not found'], 404);
        }

        return response()->json($character);
    }

    public function getWord($id)
    {
        $word = Word::where('character_id', $id)->first();

        if (!$word) {
            return response()->json(['message' => 'Word not found for character ID ' . $id], 404);
        }

        return response()->json(['word' => $word->word]);
    }
}
