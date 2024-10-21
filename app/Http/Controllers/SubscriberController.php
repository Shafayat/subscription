<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use App\Models\Website;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    public function subscribe(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:subscribers',
            'website_id' => 'required|exists:websites,id',
        ]);

        $subscriber = Subscriber::create($request->only('email', 'website_id'));
        return response()->json($subscriber, 201);
    }
}
