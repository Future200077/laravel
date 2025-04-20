<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topic;
use Inertia\Inertia;

class TopicController extends Controller
{
    //
    public function index()
    {
        $topics = Topic::with('user', 'replies.user')->latest()->get();
        return Inertia::render('Topics/Index', ['topics' => $topics]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $request->user()->topics()->create($request->only('title', 'content'));

        return redirect()->route('topics.index');
    }

    
}
