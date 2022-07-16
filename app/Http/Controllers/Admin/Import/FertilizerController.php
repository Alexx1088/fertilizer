<?php

namespace App\Http\Controllers\Admin\Import;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Fertilizer\FilterRequest;
use App\Http\Requests\Admin\Fertilizer\ImportRequest;
use App\Jobs\StoreFertilizerJob;
use App\Models\ImportStatus;
use Exception;
use function Symfony\Component\HttpKernel\DataCollector\getMessage;

class FertilizerController extends Controller
{

    public function __invoke( ImportRequest $importRequest )
    {
             ImportStatus::Create([
            'status' => 'в процессе',
            'users_id' => 1,
        ]);

        $import_status = ImportStatus::all();

        return view('admin.import.import_fertilizer', compact('import_status' ));
    }
}
