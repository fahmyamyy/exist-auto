<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Exception;

class CommentController extends Controller
{
    public function createComment(Request $request)
    {
        try {
            $newComment = Comment::create([
                'id' => Str::uuid(),
                'forum_id' => $request->postId,
                'comment' => $request->comment,
                'created_by' => Auth::user()->id
            ]);
            $newComment->save();

        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Failed comment on post: ' . $e->getMessage());
        }
        return redirect()->back()->with('success', 'Comment Posted!');
    }
}
