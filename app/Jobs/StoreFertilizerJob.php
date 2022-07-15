<?php

namespace App\Jobs;

use App\Imports\FertilizersImport;
use App\Models\ImportStatus;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Maatwebsite\Excel\Facades\Excel;

class StoreFertilizerJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function handle()
    {
        Excel::import(new FertilizersImport(),
            public_path('excel/import/fertilizers.xls'));

        $imp_stat = 'ok';
   /*     ImportStatus::updateOrCreate(['status' => "$imp_stat",'users_id' => 1,]);*/

      ImportStatus::where("status", 'в процессе')->update(["status"
            => "Данные успешно импортированы"]);

   //  dd($import_status);
 //   $import_status = ImportStatus::where('status', '=', $imp_stat )->first();

  //    dd($import_status);
     //   return view('admin.import.import_fertilizer', compact('import_status'));
        return back()->withStatus('');
    }
}
