<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PermissionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $roleId = $this->pivot->role_id ?? null;

        $filteredActions = $this->actions->filter(function ($action) use ($roleId) {
            return $action->pivot->role_id == $roleId;
        })->values();

        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'actions' => ActionResource::collection($filteredActions),
        ];
    }
}
