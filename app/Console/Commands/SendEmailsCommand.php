<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Models\EmailQueue;

class SendEmailsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'emails:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send emails to subscribers for new posts';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Retrieve all email queues where the email has not been sent
        $emailQueue = EmailQueue::where('sent', false)
            ->with(['post.website', 'post.website.subscribers']) // Eager load related models
            ->get();

        foreach ($emailQueue as $queue) {
            $post = $queue->post; // Get the post associated with the queue
            $subscribers = $post->website->subscribers; // Get the subscribers for the website

            foreach ($subscribers as $subscriber) {
                // Send the email to each subscriber
                Mail::raw("New post: {$post->title}\n\n{$post->description}", function ($message) use ($subscriber) {
                    $message->to($subscriber->email)
                        ->subject('New Post Notification');
                });
            }

            // Mark the email as sent
            $queue->sent = true;
            $queue->save();
        }

        $this->info('Emails sent successfully.');
    }
}
