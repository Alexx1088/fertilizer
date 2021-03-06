<?php

namespace App\Http\Controllers\Admin\Clients;

use App\Http\Controllers\Controller;
use App\Http\Filters\ClientFilter;
use App\Http\Requests\Admin\Clients\FilterRequest;
use App\Jobs\StoreClientsJob;
use App\Models\Client;

class IndexController extends Controller
{

    public function __invoke(FilterRequest $request)
    {

        $data = $request->validated();

            $filter = app()->make(ClientFilter::class, ['queryParams' => array_filter($data)]);

        $clients_searches = Client::filter($filter)->get();

        $clients = Client::all();

        $deleted_clients = Client::onlyTrashed()->get();

        StoreClientsJob::dispatch();

        return view('admin.client.index', compact('clients', 'deleted_clients',
            'clients_searches', 'data' ));
    }
}
