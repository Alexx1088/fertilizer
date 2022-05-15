<?php

namespace App\Http\Controllers\Admin\Clients;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Clients\StoreRequest;
use App\Models\Client;

class StoreController extends Controller
{

    public function __invoke(StoreRequest $request)
    {

        $data = $request->validated();

               Client::firstOrCreate($data);

  return redirect()->route('admin.clients.index');

    }
}
