<?php

namespace App\Http\Controllers\Admin\Import;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Clients\FilterRequest;
use App\Http\Requests\Admin\Clients\ImportRequest;
use App\Jobs\StoreClientsJob;

class ClientsController extends Controller
{

    public function __invoke(FilterRequest $request, ImportRequest $importRequest )
    {
                           StoreClientsJob::dispatch();
        return view('admin.import.import_clients');
    }
}
