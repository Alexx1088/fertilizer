<?php

namespace App\Jobs;

use App\Http\Requests\Admin\Clients\ImportRequest;
use App\Imports\FertilizersImport;
use App\Models\ImportStatus;
use Exception;
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
    public function handle(ImportRequest $importRequest)
    {
        try {
            Excel::import(new FertilizersImport,
                $importRequest->file('import_file')
            );

            ImportStatus::where("status", '=', "в процессе")->update
            (["status" => "Данные успешно импортированы"]);

            return back()->withStatus('');
        } catch (Exception $e) {
            ImportStatus::where("status", '=', "в процессе")->update
            (["status" => "Ошибка во время импорта"]);

        }
    }
}
