<?php

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use App\Models\Discussion;
// use Inertia\Inertia;

// class DiscussionController extends Controller
// {
    
//     public function index($id)
//     {
//         return Discussion::with('user')->findOrFail($id);
//     }

//     public function index()
//     {
//         return Discussion::with('user')->latest()->get();
//     }

//     public function index()
//     {
//         return Inertia::render('Components/DiscussionForm');
//     }


//     public function index()
//     {
//         $discussions = Discussion::latest()->paginate(5);
//         return Inertia::render('Index', compact('discussions'))
//                     ->with('i', (request()->input('page', 1) - 1) * 5);
//     }

//     public function show()
//     {
//         $discussions = Discussion::with('user')->latest()->get();

//         return Inertia::render('Dashboard', [
//             'discussions' => $discussions,
//         ]);
//     }
//     public function edit(Discussion $discussion)
//     {
//         return Inertia::render('/Edit', [
//             'discussion' => $discussion
//         ]);
//     }
// }



// namespace App\Http\Controllers;

// use App\Models\Discussion;
// use Illuminate\Http\Request;
// use Inertia\Inertia;

// class DiscussionController extends Controller
// {
//     public function index()
//     {
//         return Inertia::render('Discussions/Index', [
//             'discussions' => Discussion::latest()->get()
//         ]);
//     }

//     public function store(Request $request)
//     {
//         $request->validate([
//             'title' => 'required',
//             'body' => 'required',
//         ]);

//         Discussion::create($request->only('title', 'body'));

//         return redirect()->route('discussions.index');
//     }

//     public function edit(Discussion $discussion)
//     {
//         return Inertia::render('Discussions/Edit', [
//             'discussion' => $discussion
//         ]);
//     }

//     public function update(Request $request, Discussion $discussion)
//     {
//         $request->validate([
//             'title' => 'required',
//             'body' => 'required',
//         ]);

//         $discussion->update($request->only('title', 'body'));

//         return redirect()->route('discussions.index');
//     }

//     public function destroy(Discussion $discussion)
//     {
//         $discussion->delete();

//         return redirect()->route('discussions.index');
//     }
// }


// use App\Http\Controllers\DiscussionController;

// Route::get('/', [DiscussionController::class, 'index'])->name('discussions.index');
// Route::resource('discussions', DiscussionController::class)->except(['show']);



namespace App\Http\Controllers;

use App\Models\Discussion;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DiscussionController extends Controller
{
    public function index()
    {
        $discussions = Discussion::with('user')->latest()->get();
        return Inertia::render('Discussions/Index', [
            'discussions' => $discussions,
        ]);
    }

    public function create()
    {
        return Inertia::render('Discussions/Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
        ]);

        $request->user()->discussions()->create($request->only('title', 'body'));

        return redirect()->route('discussions.index');
    }
}
