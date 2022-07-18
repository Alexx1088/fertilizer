<?php

namespace App\Http\Controllers\Admin\Import;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Fertilizer\ImportRequest;
use App\Http\Requests\Admin\User\UpdateRequest;
use App\Jobs\StoreFertilizerJob;
use App\Models\ImportStatus;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;

class Fertilizer_update_Controller extends Controller
{

    public function __invoke(ImportRequest $importRequest )
    {
      /*  $date = $importRequest->only(['import_file']);

        dd($date);*/

 $importRequest->validate(['import_file' => 'required|mimes:xls']);

        ImportStatus::Create([
            'status' => 'в процессе',
            'users_id' => 1,
        ]);


            StoreFertilizerJob::dispatch();

      /*  DB::table('import_statuses')
            ->where('status', '=', 'в процессе')
            ->update(['status' => 'ok']);*/

         $import_status = ImportStatus::all();

        return view('admin.import.import_fertilizer', compact('import_status'));
    }
}
