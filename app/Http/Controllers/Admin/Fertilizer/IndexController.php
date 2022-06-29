<?php

namespace App\Http\Controllers\Admin\Fertilizer;

use App\Http\Controllers\Controller;
use App\Http\Filters\FertilizerFilter;
use App\Http\Requests\Admin\Fertilizer\FilterRequest;
use App\Http\Requests\Admin\Fertilizer\ImportRequest;
use App\Jobs\StoreFertilizerJob;
use App\Models\Culture;
use App\Models\Fertilizer;

class IndexController extends Controller
{

    public function __invoke(FilterRequest $request, ImportRequest $importRequest )
    {
   $data = $request->validated();
     $data_import = $importRequest->validated();

        $filter = app()->make(FertilizerFilter::class, ['queryParams' => array_filter
        ($data)]);

        $fertilizers_searches = Fertilizer::filter($filter)->get();

        $fertilizers = Fertilizer::all();

        $cultures = Culture::all();

        $deleted_fertilizers = Fertilizer::onlyTrashed()->get();

        StoreFertilizerJob::dispatch();

        return view('admin.fertilizer.index',
            compact('fertilizers', 'deleted_fertilizers',
                'fertilizers_searches', 'data', 'cultures'));
    }
}
