<?php

namespace App\Http\Controllers\Admin\Fertilizer;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Fertilizer\FilterRequest;
use App\Models\Fertilizer;

class ShowController extends Controller
{

    public function __invoke(Fertilizer $fertilizer, FilterRequest $request)
    {
                       return view('admin.fertilizer.show', compact('fertilizer'));
    }
}
