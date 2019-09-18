<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use \App\Choice;

class Order extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //$items = Choice::where('order_id', $this->id)->;
        return [
            'id' => $this->id,
            'items' => $this->cart->cartItems,
            'total' => $this->total,
          ];
    }
}
