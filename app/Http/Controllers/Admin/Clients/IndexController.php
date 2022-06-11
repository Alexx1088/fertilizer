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
  //      dd($data);

if (isset($data['regions'])) {

    $regions = $data['regions'];
}

else {
    $regions = null;
}
            $filter = app()->make(ClientFilter::class, ['queryParams' => array_filter($data)]);

        $clients_searches = Client::filter($filter)->get();
     //   dd($clients_searches);
        $clients = Client::all();

        $deleted_clients = Client::onlyTrashed()->get();

        return view('admin.client.index', compact('clients', 'deleted_clients',
            'clients_searches', 'regions', 'data' ));
    }
}
