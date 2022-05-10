<?php

namespace App\Http\Controllers\Admin\Clients;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Culture\StoreRequest;
use App\Models\Client;

class StoreController extends Controller
{

    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();

      dd($data);

        Client::firstOrCreate($data);

  return redirect()->route('admin.client.index');

    }
}
