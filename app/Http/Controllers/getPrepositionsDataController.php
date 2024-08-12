<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Preposition;
use App\Models\PrepositionTest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class getPrepositionsDataController extends Controller
{
    public function getdata(Request $request)
    {
        $name = $request->input('name');

        // Retrieve the preposition by name
        $preposition = Preposition::where('name', $name)->first();

        if (!$preposition) {
            return response()->json(['message' => 'Preposition not found'], 404);
        }

        // Retrieve the associated test
        $test = PrepositionTest::where('preposition_name', $name)->first();

        if (!$test) {
            return response()->json(['message' => 'Preposition test not found'], 404);
        }

        // Generate the full URL to the image and sound paths
        $imageUrl = $preposition->image ? Storage::url($preposition->image) : null;
        $soundUrl = $preposition->sound ? Storage::url($preposition->sound) : null;
        $testImageUrl = $test->image ? Storage::url($test->image) : null;
        $testSoundUrl = $test->sound ? Storage::url($test->sound) : null;

        // Prepare the response data
        $response = [
            'name' => $preposition->name,
            'recognize' => [
                'image' => $imageUrl,
                'sentence' => $preposition->sentence,
                'sound' => $soundUrl,
            ],
            'test' => [
                'word1' => 'من',
                'word2' => 'إلى',
                'word3' => 'عن',
                'word4' => 'على',
                'word5' => 'في',
                'sentence' => $test->sentence,
                'image' => $testImageUrl,
                'sound' => $testSoundUrl,
            ],
        ];

        return response()->json($response);
    }
}
