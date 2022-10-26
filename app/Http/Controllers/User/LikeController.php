<?php

namespace App\Http\Controllers\User;

use App\Models\Like;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LikeController extends Controller
{
    public function store(Request $request)
    {
       $like = auth()->user()->likes()->create($request->validate(['post_id' => 'required']));

       Post::findOrFail($like['post_id']);

       return $this->res(['result' => Like::where('post_id', $request->post_id)->count()]);
    }

    public function destroy($id)
    {
        Post::findOrFail($id);

        $like =  Like::where('user_id', auth()->id())->where('post_id', $id)->first();

        $like->delete();

        return $this->res(['result' => Like::where('post_id', $id)->count()]);

    }
}