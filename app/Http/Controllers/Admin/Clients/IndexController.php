<?php

namespace App\Http\Controllers\Admin\Clients;

use App\Http\Controllers\Controller;
use App\Http\Filters\ClientFilter;
use App\Http\Requests\Admin\Clients\FilterRequest;
use App\Models\Client;

class IndexController extends Controller
{

    public function __invoke(FilterRequest $request)
    {
        $data = $request->validated();

if (isset($data['regions'])) {

    $regions = $data['regions'];
}

else {
    $regions = null;
}
            $filter = app()->make(ClientFilter::class, ['queryParams' => array_filter($data)]);

        $clients_search = Client::filter($filter)->get();

        $clients = Client::all();

        $deleted_clients = Client::onlyTrashed()->get();

        return view('admin.client.index', compact('clients', 'deleted_clients',
            'clients_search', 'regions' ));
    }
}
