<?php

namespace App\Http\Controllers\Fertilizer;

use App\Http\Controllers\Controller;
use App\Http\Requests\Fertilizer\UpdateRequest;
use App\Models\Fertilizer;

class UpdateController extends Controller
{

    public function __invoke(UpdateRequest $request, Fertilizer $fertilizer)
    {
        $data = $request->validated();

        $fertilizer->update($data);

         return view('fertilizer.show', compact('fertilizer'));
    }
}
