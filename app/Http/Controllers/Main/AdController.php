<?php

namespace App\Http\Controllers\Main;

use App\Models\Ad;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdController extends Controller
{
    public function __invoke(Ad $ad)
    {
        return view('main.ad.show', [
            'ad' => $ad->load('media'),
        ]);
    }
}