<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class shipmentnotif extends Notification
{
    use Queueable;

    private $input_id;
    private $user_create;

    public function __construct($input_id,$user_create)
    {
        $this->input_id = $input_id;

       $this->user_create = $user_create;

    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];

    }


    /**
 * Get the array representation of the notification.
 *
 * @return array<string, mixed>
 */
public function toArray(object $notifiable): array
{
    return [
        'input_id' => $this->input_id,
        'user_create' => $this->user_create,
    ];
}
}
