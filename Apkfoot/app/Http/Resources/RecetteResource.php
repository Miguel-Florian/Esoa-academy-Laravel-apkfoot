<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RecetteResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
      //  return parent::toArray($request);
         return [
            'id' => $this->id,
            'Prix' => $this->Prix,
            'date' =>$this->date,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
       /* public function name($request)
    {
      //  return parent::toArray($request);
         return [
            'name' => $this->name,
        ];
    }*/
}
