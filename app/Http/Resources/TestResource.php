<?php

namespace App\Http\Resources;

use App\Models\Character;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TestResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $char = $this->character;
        $characters = $this->split($this->word);
        return [
            'chars' => $characters,
            'trueChoice' => $this->trueChoice($this->word,$this->character->character),//$this->trueChoice($this->word,$this->character->character),
            'emptyChar' => $this->emptyChar($this->word, $this->character->character),
            'image' => url($this->image),

        ];
    }
    public function split($word)
    {
        $characters = mb_str_split($word, 1);
        $chars = [];
        $count = count($characters);
        $index = 1;
        foreach ($characters as $char) {
            $chars["char$index"] = $char;
            $index++;
        }
        return $chars;
    }
    public function emptyChar($word, $character)
    {
        if($character == "أ"){
            return 4;
        }
        
        return mb_strpos($word, $character) + 1;}
    
    public function trueChoice($word, $character)
    {
        if($character == 'أ'){
            return 3;
        }
        
        if (mb_substr($word,0,1) == $character)
            return 1;
        elseif (mb_substr($word,-1) == $character)
            return 3;
        else
            return 2;
    }
}
