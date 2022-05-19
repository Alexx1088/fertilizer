<?php

namespace App\Http\Controllers\Admin\Culture;

use App\Http\Controllers\Controller;
use App\Models\Culture;

class IndexController extends Controller
{

    public function __invoke()
    {

        $cultures = Culture::all();

        $deleted_cultures = Culture::onlyTrashed()->get();

        return view('admin.culture.index', compact('cultures', 'deleted_cultures'));
    }
}
