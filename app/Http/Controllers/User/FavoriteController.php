<?php

namespace App\Http\Controllers\User;

use App\Models\Post;
use App\Models\User;
use App\Models\Favorite;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;

class FavoriteController extends Controller
{
    public function index()
    {
        if(request()->ajax())
        {
            $favorites = Favorite::query()->whereHasMorph('favoritable', [Post::class, User::class])->whereBelongsTo(auth()->user())->get();

            return DataTables::of($favorites)
                   ->addIndexColumn()
                   ->addColumn('actions', function($row) {

                    $btn = "
                        <div class='dropdown'>
                            <a class='btn btn-sm btn-icon-only text-light' href='#' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                            <i class='fas fa-ellipsis-v'></i>
                            </a>
                            <div class='dropdown-menu dropdown-menu-right dropdown-menu-arrow'>
                                <a class='dropdown-item' href='javascript:void(0)' onclick='c_destroy($row->id,`user.favorites.destroy`,`.favorite_dt`)'>Delete</a>
                            </div>
                        </div> ";
    
                    return $btn;
    
                   })
                   ->rawColumns(['actions'])
                   ->make(true);
        }

        return view('user.favorite.index');
    }

    public function store(Request $request)
    {
        $model = match($request->model_type) {
            'post' => Post::find($request->post_id),
            'user' => User::find($request->user_id),
        };

        $model->favorites()->create(['user_id' => auth()->id(), 'favoritable_name' => $model->title ?? $model->full_name]);

        return back()->with(['success' => 'Added to Favorites']);
    }

    public function destroy(Request $request, $id)
    {
        if($request->ajax())
        {
            Favorite::find($id)->delete();

            return $this->res(['success' => 'Record Deleted Successfully']);
        }
        
        $model = match($request->model_type) {
            'post' => "App\Models\Post",
            'user' => "App\Models\User",
            //'user_service' => "App\Models\UserService",
        };

        $favoritable_id = $request->model_type == 'post'? Post::whereSlug($id)->first()->id : $id;

        Favorite::where('favoritable_id', $favoritable_id)->where('favoritable_type', $model)->delete();

        return back()->with(['success' => 'Removed from Favorites']);
    }
}