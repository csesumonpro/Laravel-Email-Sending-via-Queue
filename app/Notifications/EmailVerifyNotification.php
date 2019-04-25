<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\NexmoMessage;
class EmailVerifyNotification extends Notification implements ShouldQueue
{
    use Queueable;
    protected $user;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail','nexmo'];
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
                     ->from('admin@sumon-it.com', 'Admin')
                    ->subject('Account Verification Email')
                    ->line("Welcome {$this->user->name}")
                    ->line("Please Verify Your Email for Activate Your Account")
                    ->action('Click Here',route('admin.verify',$this->user->token))
                    ->line('Thank you for using our services!');
    //    Below Code for used custon view file             
        // return (new MailMessage)->view(
        //     'email.admin_verify', ['user' => $this->user]
        // );
    }
    public function toNexmo($notifiable)
{
    return (new NexmoMessage)
                ->content("Hello {$this->user->name} Your Account Succesfylly Registered.");
               
                
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
