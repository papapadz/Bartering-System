<?php

namespace App\Http\Controllers\User;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Comment\CommentRequest;

class CommentController extends Controller
{
    public function show($id)
    {
        return $this->res(['result' => Post::with('comments.user.media')->where('id', $id)->first() ]);     // get all comments by product id
    }

    public function store(CommentRequest $request)
    {
        $comment = Comment::create($request->validated() + ['user_id' => auth()->id()]);
        $comment['user'] = auth()->user()->full_name;
        $comment['avatar'] = auth()->user()->avatar_profile;
        $comment['count'] = Comment::where('post_id', $request->post_id)->count();

        return $this->res(['result' => $comment ]);
    }

    public function update(CommentRequest $request, Comment $comment)
    {
        $comment->update($request->validated() + ['user_id' => auth()->id()]);
        $comment['user'] = auth()->user()->full_name;
        $comment['avatar'] = auth()->user()->avatar_profile;

        return $this->res(['result' => $comment]);
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();

        return $this->res(['result' => Comment::where('post_id', request('post'))->count()]);

    }
}