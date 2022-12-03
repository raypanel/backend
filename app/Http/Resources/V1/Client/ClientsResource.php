<?php

namespace App\Http\Resources\V1\Client;


use App\Http\Resources\Resource;
use Carbon\Carbon;

class ClientsResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'uuid' => $this['uuid'],
            'name' => $this['name'],
            'phone' => $this['phone'],
            'is_payed' => $this['is_payed'],
            'payed_at' => $this['payed_at'],
            'started_at' => $this['started_at'],
            'finished_at' => $this['finished_at'],
            'remaining_time' => Carbon::parse($this['finished_at'] ?? now()->addMonth())->diff($this['started_at'])->days
        ];
    }
}
