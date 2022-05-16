<?php

namespace App\Http\Controllers\Fertilizer;

use App\Http\Controllers\Controller;
use App\Models\Fertilizer;

class IndexController extends Controller
{

    public function __invoke()
    {

        $fertilizers = Fertilizer::all();

        return view('fertilizer.index', compact('fertilizers'));
    }
}
