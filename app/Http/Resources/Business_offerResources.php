<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Business_offerResources extends JsonResource
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'category' => $this->category->name,
            'short_description' => $this->short_description,
            'images' => $this->images,
        ];
    }
}
