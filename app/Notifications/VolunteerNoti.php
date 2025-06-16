<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use PhpParser\Node\Stmt\ElseIf_;

class VolunteerNoti extends Notification
{
    use Queueable;
    protected $volunteerName;
    protected $programName;
    protected $status;
    protected $linkgp;
    protected $remark;
    /**
     * Create a new notification instance.
     */
    public function __construct($volunteerName, $programName,$status,$linkgp,$remark)
    {
        $this -> volunteerName = $volunteerName;
        $this-> programName = $programName;
        $this-> status = $status;
        $this->linkgp = $linkgp;
        $this->remark = $remark;

    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable)
    {

        $message = new MailMessage;
        $message->greeting('Hello ' . $this->volunteerName . ',');

        $message->subject('Your Application Status Has Been Updated');
        
         if ($this->status === 'Accepted') {
            $message->line("Congratulations! Your application for '{$this->programName}' has been **accepted**.")
                    ->line("This the link group of this program")
                    ->line("👉 [Join Group Here]({$this->linkgp})")
                    ->line("Make sure to check the group regularly for announcements and instructions.");
                    
        }
        else {
            $message->line("We're sorry to inform you that your application for '{$this->programName}' has been **rejected**.")
                    ->line("The Remarks: '{$this->remark}'")
                    ->line("You can apply to other programs on the platform.");
        }
        
        return $message->action('Check Status', url('/trackstatus'))
                       ->line('Thank you for using CareBridge!');

    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
