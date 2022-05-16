<?php

namespace App\Http\Controllers\Fertilizer;

use App\Http\Controllers\Controller;
use App\Models\Fertilizer;

class DeleteController extends Controller
{

    public function __invoke( Fertilizer $fertilizer)
    {
               $fertilizer->delete();

        return redirect()->route('fertilizer.index');
    }
}
