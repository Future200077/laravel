<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reply;
use App\Models\Topic;
use App\Models\User;
use Inertia\Inertia;

class ReplyController extends Controller
{
    //
    public function store(Request $request, Topic $topic)
    {
        $request->validate([
            'content' => "required|string",
        ]);
        $request->user()->replies()->create([
            'topic_id' => $topic->id,
            'content' => $request->content,
        ]);

        return redirect() -> route('replies.show',['topic' => $topic->id]);
    }

    public function showreply(Topic $topic)
    {
        $replies = Reply::where('topic_id', $topic->id)->with('user')->latest()->get();
        
        return Inertia::render('Replies/Index', ['replies' => $replies,'topic' => $topic,]);
    }
}
