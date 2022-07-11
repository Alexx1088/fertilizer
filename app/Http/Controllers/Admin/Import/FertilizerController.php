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
      if (isset($data)) {
          ImportStatus::firstOrCreate(
              [
                  'status' => 'in progress',
                  'users_id' => 444,
                  ]
          );
      }

        return view('admin.import.import_fertilizer');
    }
}
