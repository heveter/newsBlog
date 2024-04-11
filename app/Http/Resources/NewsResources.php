<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class NewsResources extends JsonResource
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'type' => $this->type,
            'title' => $this->title,
            'short_description' => $this->short_description,
            'full_content' => $this->full_content,
            'date' => $this->date,
            'images' => $this->images,
            'is_visible' => $this->is_visible,
        ];
    }
}
