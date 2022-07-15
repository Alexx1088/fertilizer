<?php

namespace App\Http\Controllers\Admin\Import;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Fertilizer\ImportRequest;
use App\Jobs\StoreFertilizerJob;
use App\Models\ImportStatus;

class Fertilizer_update_Controller extends Controller
{

    public function __invoke( ImportRequest $importRequest )
    {
      //  $import_status = ImportStatus::all();
             StoreFertilizerJob::dispatch();

    //    $imp_stat = 'ok';
   //    $import_status = ImportStatus::where('status', '=', $imp_stat )->get();

      $import_status = ImportStatus::all();

 // dd($import_status);
   /*     foreach ($import_status as $item) {
            dd($item);
        }*/
        return view('admin.import.import_fertilizer', compact('import_status'));
    }
}
