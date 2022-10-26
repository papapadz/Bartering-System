<?php

namespace App\Http\Controllers\User;

use App\Models\Rating;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RatingController extends Controller
{
    public function __invoke(Request $request)
    {
        $data =  $request->validate([
            'receiver_id' => 'required',
            'rating' => 'required',
            'comment' => 'required'
        ]);

        // check if the barterer has already submitted a rating for this month.

        $check_record = Rating::where('sender_id', auth()->id())->where('receiver_id', $request->receiver_id)->whereMonth('created_at', now())->first();

        if($check_record) {
            return back()->with(['error' => 'Ooops! You already have submitted a rating to this Barterer. You can only add a rating to each barterer once a month']);
        }

        $rating = Rating::create($data + ['sender_id' => auth()->id()]);

        $this->log_activity(model: $rating, event: 'rated', model_name: 'Barterer', model_property_name: $rating->receiver->name);  // logs

        return back()->with(['success' => 'Thank you for your feedback. Your rating has been submitted successfully']);
    }
}