<?php

namespace App\Notifications;

use App\Models\Project;
Use App\Models\Task;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

use Illuminate\Notifications\Messages\BroadcastMessage;

class DependentTaskCompleted extends Notification
{
    use Queueable;

   public $project;
   public $taskCompleted;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Project $project, Task $taskCompleted)
    {
        $this->project = $project;
        $this->taskCompleted = $task;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database', 'braodcast'];
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
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
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
              'message' => 'The task ' . $this->task->title . ' was completed. You can now perform the depending task.',
            'link' => '/projects/' . $this->project->id,
            'task_completed' => $this->taskCompleted
        ];
    }


    /**
     * Get the broadcastable representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return BroadcastMessage
     */
    public function toBroadcast($notifiable)
    {
        return new BroadcastMessage([
             'message' => 'The task ' . $this->task->title . ' was completed. You can now perform the depending task.',
            'link' => '/projects/' . $this->project->id,
            'task_completed' => $this->taskCompleted
        ]);
    }
}
