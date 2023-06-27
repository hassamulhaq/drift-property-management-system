<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TwoFactorVerificationResource extends JsonResource
{
    protected bool $success;
    protected string $message;
    public mixed $data;

    public function __construct($success, $message, $data = null, $resource = null)
    {
        parent::__construct($resource);
        $this->success = $success;
        $this->message = $message;
        $this->data = $data;
    }

    public function toArray(Request $request): array
    {
        if (!empty($this->data)) {
            $this->data = [
                'user_id' => $this->data['user_id'] ?? 0,
                'token_type' => $this->data['token_type'] ?? '',
                'access_token' => $this->data['access_token'] ?? '',
                'token_expiry_minutes' => $this->data['token_expiry_minutes'] ?? ''
            ];
        }

        return [
            'success' => $this->success,
            'message' => $this->message,
            'data' => $this->data
        ];
    }
}
