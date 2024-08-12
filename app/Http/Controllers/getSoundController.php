<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class getSoundController extends Controller
{
    public function getSoundById($id)
    {
        // Retrieve the sound record by ID
        $sound = DB::table('sounds')->where('id', $id)->first();

        if (!$sound) {
            return response()->json(['message' => 'Sound not found'], 404);
        }

        // Generate the full URL to the sound path
        $soundUrl = $sound->sound ? Storage::url($sound->sound) : null;

        // Prepare the response data
        $response = [
            'id' => $sound->id,
            'sound' => $soundUrl,
        ];

        return response()->json($response);
    }
}
