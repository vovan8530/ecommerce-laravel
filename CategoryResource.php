<?php

namespace App\Http\Requests\my;


use App\Models\Category;
use Illuminate\Http\Resources\Json\JsonResource;


class CategoryResource extends JsonResource {
  /**
   * Transform the resource into an array.
   *
   * @param \Illuminate\Http\Request $request
   * @return array
   */
  public function toArray($request): array {
    /* @var Category|self $this */
    return [
      'id' => $this->id,

      'alias' => $this->alias,

      'title' => $this->title,


      'picture_file_name' => $this->assetAbsolute($this->picture_file_name ?: ''),
      '_lft' => $this->_lft,
      '_rgt' => $this->_rgt,
      'parent_id' => $this->parent_id,


      'children' => self::collection($this->whenLoaded('children')),
      'countChildren' => $this->children ? $this->children->count() : 0
    ];
  }
}
