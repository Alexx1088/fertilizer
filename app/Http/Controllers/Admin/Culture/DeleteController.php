<?php

namespace App\Http\Controllers\Admin\Culture;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Culture\UpdateRequest;
use App\Models\Culture;

class DeleteController extends Controller
{

    public function __invoke( Culture $culture)
    {

        $culture->delete();

        return redirect()->route('admin.culture.index');
    }
}
