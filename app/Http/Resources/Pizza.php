<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Pizza extends JsonResource
{
  /**
   * Transform the resource into an array.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return array
   */
  public function toArray($request)
  {
    return [
      'id' => $this->id,
      'name' => $this->name,
      'description' => $this->description,
      'price' => (float) $this->price,
      'image_link' => (float) $this->image_link,
    ];
  }
}
