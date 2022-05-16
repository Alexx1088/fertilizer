<?php

namespace App\Http\Controllers\Fertilizer;

use App\Http\Controllers\Controller;

class CreateController extends Controller
{

    public function __invoke()
    {
                    return view('fertilizer.create');
    }
}
