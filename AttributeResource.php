<?php

namespace App\Http\Requests\my;


use Illuminate\Http\Resources\Json\JsonResource;


class AttributeResource extends JsonResource
{

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        /* @var Attribute|self $this */
        return array_merge([
            'id' => $this->id,

            'alias' => $this->alias,
            'title' => $this->title,
            'display_order' => $this->display_order,

            'attribute_options' => AttributeOptionResource::collection($this->whenLoaded('attributeOptions'))
        ]);
    }
}
