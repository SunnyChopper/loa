<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NewPayment extends Notification
{
    use Queueable;
    private $first_name;
    private $last_name;
    private $email;
    private $total;
    private $item;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->first_name = $data["first_name"];
        $this->last_name = $data["last_name"];
        $this->email = $data["email"];
        $this->total = $data["total"];
        $this->item = $data["item"];
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->from(env('MAIL_USERNAME'), 'Law of Ambition')
                    ->cc('sunny@lawofambition', 'Sunny Singh')
                    ->subject('💵 Law of Ambition - New Customer Alert 💵')
                    ->line('New customer alert for Law of Ambition.')
                    ->line($this->first_name . " " . $this->last_name . " (" . $this->email . ") just paid $" . $this->total . " for " . $this->item . ".");
                    ->line("Login to the admin dashboard to view more details.")
                    ->action('Access Dashboard', url('/admin?redirect_url=admin/mentoring/view'));
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
