<?php

namespace App\Http\Controllers\Admin\Import;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Fertilizer\FilterRequest;
use App\Http\Requests\Admin\Fertilizer\ImportRequest;
use App\Jobs\StoreFertilizerJob;
use App\Models\ImportStatus;

class FertilizerController extends Controller
{

    public function __invoke(FilterRequest $request, ImportRequest $importRequest )
    {
                      StoreFertilizerJob::dispatch();
      $data = $importRequest->validated();
 //dd($data);
        $import_status = ImportStatus::all();
//    dd($import_status);
        return view('admin.import.import_fertilizer', compact('import_status'));
    }
}
