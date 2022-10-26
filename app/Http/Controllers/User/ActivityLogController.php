<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Activitylog\Models\Activity;
use Yajra\DataTables\Facades\DataTables;

class ActivityLogController extends Controller
{
    public function __invoke()
    {
        if(request()->ajax())
        {
            return DataTables::of(Activity::where('causer_id', auth()->id())->latest()->get())->make(true);
        }
        
        return view('user.activitylog.index');  
    }
}