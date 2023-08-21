<?php

namespace App\Http\Resources\User;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin User */
class LowerLevelUsersResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        if ($this['success']) {
            return [
                'success' => $this['success'],
                'message' => $this['message'],
                'data' => $this['data'],
            ];
        }

        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'email_verified_at' => $this->email_verified_at,
            'password' => $this->password,
            'password_confirmation' => $this->password_confirmation,
            'remember_token' => $this->remember_token,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'phone' => $this->phone,
            'country' => $this->country,
            'cnic' => $this->cnic,
            'city' => $this->city,
            'state' => $this->state,
            'zip' => $this->zip,
            'address' => $this->address,
            'address2' => $this->address2,
            'type' => $this->type,
            'reference_id' => $this->reference_id,
            'two_factor_enabled' => $this->two_factor_enabled,
            'two_factor_code' => $this->two_factor_code,
            'two_factor_expires_at' => $this->two_factor_expires_at,
            'otp' => $this->otp,
            'parent_id' => $this->parent_id,
            'lower_level_roles_count' => $this->lower_level_roles_count,
            'notifications_count' => $this->whenCounted('notifications_count'),
            'permissions_count' => $this->whenCounted('permissions_count'),
            'read_notifications_count' => $this->whenCounted('read_notifications_count'),
            'roles_count' => $this->whenCounted('roles_count'),
            'tokens_count' => $this->whenCounted('tokens_count'),
            'unread_notifications_count' => $this->whenCounted('unread_notifications_count'),

            'lower_level_roles' => LowerLevelUsersResource::collection($this->whenLoaded('lower_level_roles')),
        ];
    }
}
