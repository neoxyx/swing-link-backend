<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MessageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'user_id' => $this->dateInit,
            'recipient_id' => $this->dateEnd,
            'message' => $this->book_id,
            'created_at' => $this->created,
            'updated_at' => $this->updated,
            'user' => [
                'name' => $this->user->name
            ]
        ];
    }
}
