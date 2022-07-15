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
      /*  $path = base_path('public/excel/import/pyshkin.jpg');
        $excel = file_get_contents($path);

        try {
            if($excel) {
                        throw new Exception('file found');
            }
        }catch (Exception $e){
            echo $e->getMessage();
        }*/


      /*  $importRequest->validate([
            'import_file' => 'required|mimes:xls'
        ]);*/

          //           StoreFertilizerJob::dispatch();
  //    $data = $importRequest->validated();
//dd($data);
        $import_status = ImportStatus::all();

        return view('admin.import.import_fertilizer', compact('import_status'));
    }
}
