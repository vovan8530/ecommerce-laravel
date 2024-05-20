<?php

namespace App\Http\Requests\my;


use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        /* @var Product|self $this */
        return [
            'id' => $this->id,

            'alias' => $this->alias,
            'code' => $this->code,
            'title' => $this->title,


            'description' => $this->description,

            'price' => $this->price,
            'new_price' => $this->calculateNewPrice(),

            'display_order' => $this->display_order,

            'attributeOptions' => AttributeOptionResource::collection($this->whenLoaded('attributeOptions')),
            'category' => new CategoryResource($this->whenLoaded('category')),

        ];
    }
}
