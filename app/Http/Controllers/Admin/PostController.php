<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Resources\Post\PostResource;
use App\Http\Requests\Post\Admin\PostRequest;
use App\Mail\PostUpdate;

class PostController extends Controller
{
    public function index(Request $request)
    {
        if(request()->ajax())
        {
            $posts = PostResource::collection(Post::query()
                ->when($request->has('status'), fn($q) => $q->where('status', $request->status))
                ->with('user', 'category', 'media')->get()
            );

            return DataTables::of($posts)
                   ->addIndexColumn()
                   ->addColumn('actions', function($row) {

                    $new_row = collect($row);

                    $route_show = route('admin.posts.show', $new_row['slug'] );

                    $btn = "
                        <div class='dropdown'>
                            <a class='btn btn-sm btn-icon-only text-light' href='#' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                            <i class='fas fa-ellipsis-v'></i>
                            </a>
                            <div class='dropdown-menu dropdown-menu-right dropdown-menu-arrow'>

                                <a class='dropdown-item' href='$route_show'>View</a>

                            </div>
                        </div> ";
    
                    return $btn;
    
                   })
                   ->rawColumns(['actions'])
                   ->make(true);
        }

        return view('admin.post.index');
    }

    public function show(Post $post)
    {
        return view('admin.post.show', [
            'post' => $post->load('user.avatar', 'category', 'media'),
        ]);
    }

    public function update(PostRequest $request, Post $post)
    {
        $post->update($request->validated()); 

        Mail::to($post->user)->send(new PostUpdate(post: $post->load('user'))); // notify the user for the post status

        $this->log_activity(model: $post, event: $post->status == Post::APPROVED ? 'approved' : 'rejected', model_name: 'Post', model_property_name: $post->title);  // logs

        return to_route('admin.posts.index')->with(['success' => 'Post Updated Successfully']);
    }

}