<?php
namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AppFormResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'client' => new ClientResource($this->client),
            'created_at' => $this->created_at,
        ];
    }
}
