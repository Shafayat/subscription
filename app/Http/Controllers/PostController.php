<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Website;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\EmailQueue;

class PostController extends Controller
{
    public function create(Request $request)
    {
        $request->validate([
            'website_id' => 'required|exists:websites,id',
            'title' => 'required|string',
            'description' => 'required|string',
        ]);

        $post = Post::create($request->only('website_id', 'title', 'description'));
        EmailQueue::create(['post_id' => $post->id]);
        return response()->json($post, 201);
    }

    public function sendEmails()
    {
        $emailQueue = EmailQueue::where('sent', false)->with('post.website')->get();

        foreach ($emailQueue as $queue) {
            $subscribers = $queue->post->website->subscribers;

            foreach ($subscribers as $subscriber) {
                Mail::raw("New post: {$queue->post->title}\n\n{$queue->post->description}", function ($message) use ($subscriber) {
                    $message->to($subscriber->email)
                        ->subject('New Post Notification');
                });
            }

            // Mark the email as sent
            $queue->sent = true;
            $queue->save();
        }
    }
}
