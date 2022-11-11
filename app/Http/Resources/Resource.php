<?php


namespace App\Http\Resources;


use Illuminate\Http\Resources\Json\JsonResource;

class Resource extends JsonResource
{
    protected array $extra = [];

    public function toArray($request)
    {
        return array_merge(parent::toArray($request), $this->extra);
    }


    public function with($request)
    {
        return [
            'success' => true,
        ];
    }

    /**
     * @param array $extra
     * @return Resource
     */
    public function setExtra(array $extra): static
    {
        $this->extra = $extra;
        return $this;
    }
}
