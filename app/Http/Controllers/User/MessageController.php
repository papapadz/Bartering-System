<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\ImageUploadService;
use App\Http\Resources\Message\MessageResource;
use App\Http\Resources\Message\NewMessageResource;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::with('sender.media', 'recipient.media')->where('sender_id', auth()->id())->orWhere('recipient_id', auth()->id())->latest()->get();

        return view('user.message.index', [
            'participants' =>  $messages->map(fn($message) => $message->sender_id === auth()->id() ? $message->recipient : $message->sender)->unique(),
        ]);
    }

    public function create(Request $request)
    {
        $messages = Message::with('sender.media', 'recipient.media')->where('sender_id', auth()->id())->orWhere('recipient_id', auth()->id())->latest()->get();

        $participants =  $messages->map(fn($message) => $message->sender_id === auth()->id() ? $message->recipient : $message->sender)->unique();

        $user = User::find($request->user);

        return view('user.message.create', [
            'participants' =>  $participants,
            'recipient' => $user,
            'messages' => $this->show(id: $user->id),
        ]);
    }

    /**
     * get the recent messages by seller
     *
     * @param [user] $id
     * @return void
     */
   public function show($id)
   {
        if(request()->ajax())
        {   
            $messages = Message::with('sender.media', 'recipient.media', 'media')
            ->whereIn('sender_id', [auth()->id(), $id])
            ->whereIn('recipient_id', [auth()->id(), $id])
            ->orderBy('id', 'asc')
            ->take(100)
            ->get();

            return $this->res(['results' => MessageResource::collection($messages)]);
        }
   }

   public function store(Request $request, ImageUploadService $service)
   {
        if($request->ajax())
        {
            $message = Message::create($request->validate(['recipient_id' => 'required', 'message' => 'required']) + ['sender_id' => auth()->id()]);

            if($request->image)
            {
                $service->handleImageUpload(model:$message, images:$request->image, collection:'message_images', conversion_name:'card', action:'create');
            }

            return $this->res(['result' => new NewMessageResource($message->load('sender.media', 'media'))]);
        }
   }
}