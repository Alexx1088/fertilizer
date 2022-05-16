<?php

namespace App\Http\Controllers\Fertilizer;

use App\Http\Controllers\Controller;
use App\Models\Fertilizer;

class ShowController extends Controller
{

    public function __invoke(Fertilizer $fertilizer)
    {
              return view('fertilizer.show', compact('fertilizer'));
    }
}
