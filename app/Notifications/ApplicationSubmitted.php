<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class ApplicationSubmitted extends Notification
{
    use Queueable;

    public function via($notifiable)
    {
        return ['database']; // Atau 'mail', 'broadcast' jika kamu pakai fitur itu juga
    }

    public function toArray($notifiable)
    {
        return [
            'message' => 'Success!!',
        ];
    }
}
