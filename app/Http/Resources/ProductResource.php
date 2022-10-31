<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;


class ProductResource extends JsonResource
{
   
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'name'=> $this->name ?? "",
            'price'=> $this->price ?? "",
            'description'=> $this->description ?? "",
            'brand'=> ! $this->brand ? null : $this->brand->name,
            'images'=> $this->images ?? "",
            'category'=> ! $this->category ? null : $this->category->name,
        ];
    }
}
