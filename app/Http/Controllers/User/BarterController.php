<?php

namespace App\Http\Controllers\User;

use App\Models\Post;
use App\Models\Barter;
use App\Mail\ItemOffered;
use App\Mail\BarterUpdate;
use Illuminate\Http\Request;
use App\Mail\RemoveItemOffered;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\Barter\BarterRequest;
use App\Http\Resources\Barter\BarterResource;

class BarterController extends Controller
{
    public function index()
    {
        if(request()->ajax())
        {
            $bartertings = BarterResource::collection(
                Barter::with('post.media', 'bartered_post.media')
                ->whereRelation('bartered_post', 'user_id', auth()->id())
                ->orWhereRelation('post', 'user_id', auth()->id())
                ->get()
            );

            return DataTables::of($bartertings)
                   ->addIndexColumn()
                   ->addColumn('actions', function($row) {
                    $new_row = collect($row);
                    $route_show = route('user.barters.show', $new_row['id']);

                    $btn = "
                        <div class='dropdown'>
                            <a class='btn btn-sm btn-icon-only text-light' href='#' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                            <i class='fas fa-ellipsis-v'></i>
                            </a>
                            <div class='dropdown-menu dropdown-menu-right dropdown-menu-arrow'>
                                <a class='dropdown-item' href='$route_show' >View</a>";
                                if($new_row['status'] == Barter::PENDING) 
                                {
                                    // enable delete button if its not yet bartered
                                    $btn .= "
                                        <a class='dropdown-item' href='javascript:void(0)' onclick='c_destroy($new_row[id],`user.barters.destroy`,`.barter_dt`)'>Delete</a>
                                    ";
                                }
                           $btn .=" </div>
                        </div> ";
    
                    return $btn;
    
                   })
                   ->rawColumns(['actions'])
                   ->make(true);
        }

        return view('user.barter.index');
    }


    public function create(Post $post)
    {
        return view('user.barter.create', [
            'post' => $post->load('user', 'media'),
            'offered_posts' => Post::whereBelongsTo(auth()->user())->get(),
        ]);
    }

    public function store(BarterRequest $request, Post $post)
    {
        $offered_post = Barter::where(['post_id' => $request->post_id, 'bartered_post_id' => $request->bartered_post_id])->first(); // check if the item has already been offered

        if($offered_post) {
            return back()->with(['error' => 'Your item has already been offered. Please select another one.']);
        }

        $barter = Barter::create($request->validated());

        Mail::to($barter->post->user)->send(new ItemOffered(barter: $barter->load('post.user', 'bartered_post.user'))); // notify the owner of the post , that there is an offered item

        return to_route('user.barters.index')->with(['success' => 'Posted Item has been offered successfully. For faster transaction you can message the owner of the posted item. 
        Please read our FAQS page for safety guidelines about bartering.']);
    }

    public function show(Barter $barter)
    {
        return view('user.barter.show', [
            'barter' => $barter->load([
                'post' => fn($query) => $query->with('category', 'user.media'), 
                'bartered_post' => fn($query) => $query->with('category', 'user.media')
            ])
        ]);
    }

    public function update(Request $request, Barter $barter)
    {
        $barter->update($request->validate(['status' => 'required']));

        $this->log_activity(model:$barter, event: $request->status == Barter::ACCEPTED ? 'accepted' : 'rejected', model_name: 'Barter', model_property_name: $barter->bartered_post->title);

        Mail::to($barter->bartered_post->user)
            ->send(new BarterUpdate(barter: $barter->load([
                        'post' => fn($query) => $query->with('category', 'user.media'), 
                        'bartered_post' => fn($query) => $query->with('category', 'user.media')
                    ]
                )
            )
        ); // send email update to the user who offer the item

        if($request->status == Barter::ACCEPTED)
        {   
            Post::whereIn('id', [$barter->post_id, $barter->bartered_post_id])->update(['is_bartered' => true]); // mark as bartered
            
            return back()->with(['success' => 'Congratulations! you have successfully bartered an item. You can apply a rating for your co-barterer ' . $barter->bartered_post->user->full_name . 'to help our community accumulate legit barterers']);
        }
        
        if($request->status == Barter::REJECTED)
        {
            return back()->with(['success' => 'You have rejected an offered item from your co-barterer ' . $barter->bartered_post->user->full_name . 'Any Questions? You can visit our frequently asked question page or email us at info.albarter@gmail.com']);
        }
    }

    public function destroy(Barter $barter)
    {
        Mail::to($barter->post->user)->send(new RemoveItemOffered(barter: $barter->load('post', 'bartered_post')));   // update the user that the barterer remove his/here offered Item
        
        $barter->delete();

       return $this->res(['success' => 'Barter Deleted Successfully']);
    }
}