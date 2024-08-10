<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AppointmentResource extends JsonResource
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
            'start_date' => $this->start_date->format("d-m-Y"),
            'end_date' => $this->end_date->format("d-m-Y"),
            'created_at' => $this->created_at->format("d-m-Y H:i:s"),
            'updated_at' => $this->updated_at->format("d-m-Y H:i:s"),
            'admin' => $this->when($this->relationLoaded("admin"), function (){
                return new AdminResource($this->admin);
            }),
            'user' => $this->when($this->relationLoaded("user"), function (){
                return new UserResource($this->user);
            })
        ];
    }
}
