<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NewMentee extends Notification
{
    use Queueable;
    private $first_name;
    private $last_name;
    private $plan_name;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($customer_data)
    {
        $this->first_name = $customer_data["first_name"];
        $this->last_name = $customer_data["last_name"];
        $this->plan_name = $customer_data["plan_name"];
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
                    ->from(env('MAIL_USERNAME'), "Law of Ambition")
                    ->subject('Order Confirmation')
                    ->line('Welcome to the ' . $this->plan_name . '. Your order has been successfully processed.')
                    ->line('You\'re all set. Luis has been notified and will be contacting you shortly.');
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
