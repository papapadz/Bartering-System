<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use App\Models\Announcement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\ImageUploadService;
use App\Http\Requests\Announcement\AnnouncementRequest;

class AnnouncementController extends Controller
{
    public function index()
    {
        return view('admin.announcement.index', [
            'announcements' => Announcement::with('media')->get(),
        ]);
    }

    public function create()
    {
        return view('admin.announcement.create');
    }

    public function store(AnnouncementRequest $request, ImageUploadService $service)
    {
       $announcement = Announcement::create($request->validated() + ['slug' => Str::slug($request->title)]);

       if($request->image) {
             $service->handleImageUpload(model:$announcement, images:$request->image, collection:'announcement_images', conversion_name:'card', action:'create');
       }

       return to_route('admin.announcements.index')->with('success', 'Announcement Added Successfully');
    }

    public function show(Announcement $announcement)
    {
        return view('admin.announcement.show', ['announcement' => $announcement->load('media')]);
    }

    public function edit(Announcement $announcement)
    {
        return view('admin.announcement.edit', ['announcement' => $announcement]);
    }

    public function update(AnnouncementRequest $request, Announcement $announcement, ImageUploadService $service)
    {
        $announcement->update($request->validated());

        if($request->image) {
            $service->handleImageUpload(model:$announcement, images:$request->image, collection:'announcement_images', conversion_name:'card', action:'update');
        }

        return to_route('admin.announcements.index')->with('success', 'Announcement Updated Successfully');
    }

    public function destroy(Announcement $announcement)
    {
        $announcement->delete();

        return back()->with('success', 'Announcement Deleted Successfully');
    }
}