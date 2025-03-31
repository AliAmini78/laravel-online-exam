<?php

namespace Api\User\Http\Resources\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \Api\User\Models\User */
class AdminUserResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'type' => $this->type,
            'birthday' => $this->birthday,
            'created_at' => $this->created_at?->format("Y-m-d H:i:s"),
            'updated_at' => $this->updated_at?->format("Y-m-d H:i:s"),
        ];
    }
}
