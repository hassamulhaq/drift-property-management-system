<?php

namespace App\Notifications;

use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SendOtpNotification extends Notification
{
    public function __construct()
    {
    }

    public function via($notifiable): array
    {
        return ['mail'];
    }

    public function toMail($notifiable): MailMessage
    {
        $passcode = decrypt($notifiable->two_factor_code);

        return (new MailMessage)
            ->subject('Drift OTP')
            ->greeting('Hi, here is your code')
            ->line('Here is your one-time login passcode:')
            ->line($passcode)
            ->line('Do not share this code with anyone.');
    }

    public function toArray($notifiable): array
    {
        return [];
    }
}
