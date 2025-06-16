<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class ApplicationDuplicateAttempt extends Notification
{
    use Queueable;

    public function via($notifiable)
    {
        return ['database']; // atau tambahkan 'mail' kalau mau kirim email juga
    }

    public function toDatabase($notifiable)
    {
        return [
            'message' => 'Kamu sudah pernah apply untuk pekerjaan ini.',
        ];
    }
}
