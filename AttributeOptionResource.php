<?php

namespace App\Http\Requests\my;


use Illuminate\Http\Resources\Json\JsonResource;


class AttributeOptionResource extends JsonResource {
  /**
   * Transform the resource into an array.
   *
   * @param \Illuminate\Http\Request $request
   * @return array
   */
  public function toArray($request): array {
    /* @var AttributeOption|self $this */
    return [
      	    'id' => $this->id,
	    
	    'alias' => $this->alias,
	    'attribute_id' => $this->attribute_id,
	    'title' => $this->title,
	    'display_order' => $this->display_order,
	    
	    'attribute' => new AttributeResource($this->whenLoaded('attribute'))
    ];
  }
}
