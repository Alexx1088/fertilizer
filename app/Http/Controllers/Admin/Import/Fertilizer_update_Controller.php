<?php

namespace App\Http\Controllers\Admin\Import;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Fertilizer\ImportRequest;
use App\Http\Requests\Admin\User\UpdateRequest;
use App\Jobs\StoreFertilizerJob;
use App\Models\ImportStatus;
use Illuminate\Support\Facades\DB;

class Fertilizer_update_Controller extends Controller
{

    public function __invoke(ImportStatus $importStatus )
    {
                  StoreFertilizerJob::dispatch();
  $imp_stat = ImportStatus::where("status", '=', "в процессе")->update(["status"=>"ok"]);
        //      dd($imp_stat);

      /*  DB::table('import_statuses')
            ->where('status', '=', 'в процессе')
            ->update(['status' => 'ok']);*/

         $import_status = ImportStatus::all();

        return view('admin.import.import_fertilizer', compact('import_status'));
    }
}
