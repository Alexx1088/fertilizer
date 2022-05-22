<?php

namespace App\Http\Controllers\Admin\Clients;

use App\Http\Controllers\Controller;
use App\Http\Filters\Client\ClientFilter;
use App\Http\Requests\Admin\Clients\FilterRequest;
use App\Models\Client;
use Illuminate\Http\Request;
use function Doctrine\Common\Cache\Psr6\get;

class IndexController extends Controller
{

    public function __invoke(FilterRequest $request)
    {
        $data = $request->validated();

$filter = app()->make(ClientFilter::class, ['queryParams' => array_filter($data)]);

        $clients = Client::filter($filter)->get();

        dd($clients);



        $clients = Client::all();

        $deleted_clients = Client::onlyTrashed()->get();

        return view('admin.client.index', compact('clients', 'deleted_clients'));
    }
}
