<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;

class AdminResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $role = $this->roles->first();
        if ($this->hasRole("super admin"))
            $permissions = Permission::whereGuardName("admin")->get()->groupBy("group_name");
        else
            $permissions = $role->permissions->groupBy("group_name");

        return [
            'id' => $this->id,
            'email' => $this->email,
            'created_at' => $this->created_at->format("d-m-Y H:i:s"),
            'updated_at' => $this->updated_at->format("d-m-Y H:i:s"),
            "role" => $role->name,
            "permissions" => $permissions->map(function ($permissions){
                return $permissions->pluck("name");
            })
        ];
    }
}
