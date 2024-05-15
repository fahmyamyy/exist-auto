<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Forum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Exception;

class ForumController extends Controller
{
    public function showForums() {
        $forumData = Forum::paginate(4);
        return view('forums.index', compact('forumData'));
    }

    public function viewForumDetails($forumId)
    {
        $forum = Forum::findOrFail($forumId);
        $comments = Comment::where('forum_id', $forumId)
            ->orderBy('created_at')
            ->paginate(5)
        ;
        return view('forums.detail', compact('forum', 'comments'));
    }

    public function createPost(Request $request) {
        try {
            $newCars = Forum::create([
                'id' => Str::uuid(),
                'title' => $request->title,
                'content' => $request->content,
                'created_by' => Auth::user()->id
            ]);
            $newCars->save();

        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Failed post a forum: ' . $e->getMessage());
        }
        return redirect()->back()->with('success', 'Forum Posted!');
    }
}
