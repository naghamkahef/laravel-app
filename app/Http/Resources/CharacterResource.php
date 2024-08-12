<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\TestResource;
use App\Models\Character;

class CharacterResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
   // = $this->generateTest1Character($this->character);
    
    public function toArray(Request $request): array
    {
        $testCharacters = $this->generateTest1Character($this->character);

        
        
        

        return [
            'name' =>$this->name,
            'character' => $this->character,
            'recognize' => [
                'image1' =>url($this->Char_first),
                'image2' => url($this->image_first),
                'image3' => url($this->word_first),
                'imagecanvas' => url($this->canvas_first),
                'sound' =>url($this->sound_first)
            ],
            'middleWord'=> [
                'image1' =>url($this->Char_middle),
                'image2' => url($this->image_middle),
                'image3' => url($this->word_middle),
                'imagecanvas' => url($this->canvas_middle),
                'sound' =>url($this->sound_middle)

            ],
            'endWord'=>[
                'image1' =>url($this->Char_last),
                'image2' => url($this->image_last),
                'image3' => url($this->word_last),
                'imagecanvas' => url($this->canvas_last),
                'sound' =>url($this->sound_last)
            ],
            'test1' => [
                'char1' => $testCharacters[0]->character,
                'char2' => $testCharacters[1]->character,
                'sound'=>url($this->sound_test1)
            ],
            //'test2' => $this->test()->image
           
               'test2' => [new TestResource($this->whenLoaded('test')),
               'sound'=> url($this->sound_test2)
            ],

                
            


        ]; 
        
    }
    
    public function generateTest1Character($char){
        $characters = Character::select('character')->where('character','!=',$char)->inRandomOrder()->limit(2)->get();
       return $characters;

    }
    
}
