<?php

namespace App\Http\Controllers\Admin\Import;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Fertilizer\FilterRequest;
use App\Http\Requests\Admin\Fertilizer\ImportRequest;
use App\Jobs\StoreFertilizerJob;

class FertilizerController extends Controller
{

    public function __invoke(FilterRequest $request, ImportRequest $importRequest )
    {
                      StoreFertilizerJob::dispatch();
        return view('admin.import.import_fertilizer');
    }
}
