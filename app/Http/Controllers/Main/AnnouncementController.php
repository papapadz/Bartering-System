<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    public function index()
    {
        return view('main.announcement.index', [
            'announcements' => Announcement::with('media')->get(),
        ]);
    }

    public function show(Announcement $announcement)
    {
        return view('main.announcement.show', ['announcement' => $announcement->load('media')]);
    }
}