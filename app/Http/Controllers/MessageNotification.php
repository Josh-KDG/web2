<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

// MessageNotification.php
class MessageNotification extends Notification
{
    public $message;

    public function __construct(Message $message)
    {
        $this->message = $message;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('Vous avez reçu un message de ' . $this->message->sender->name)
                    ->line('Contenu : ' . $this->message->content)
                    ->action('Lire le message', url('/messages'))
                    ->line('Merci d\'utiliser notre application!');
    }
}
