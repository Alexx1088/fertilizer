<?php

namespace App\Http\Controllers\Admin\Clients;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;

class IndexController extends Controller
{

    public function __invoke()
    {
        $clients = Client::all();

        $deleted_clients = Client::onlyTrashed()->get();

        return view('admin.client.index', compact('clients', 'deleted_clients'));
    }
}
