<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TwoStepConfirmationEmailSentResource extends JsonResource
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
                'url' => $this->data['url']
            ];
        }

        return [
            'success' => $this->success,
            'message' => $this->message,
            'data' => $this->data
        ];
    }
}
