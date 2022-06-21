<?php

namespace App\Http\Controllers\Admin\Fertilizer;

use App\Http\Controllers\Controller;
use App\Http\Filters\FertilizerFilter;
use App\Http\Requests\Admin\Fertilizer\FilterRequest;
use App\Models\Culture;
use App\Models\Fertilizer;

class IndexController extends Controller
{

    public function __invoke(FilterRequest $request)
    {
        $data = $request->validated();

        $filter = app()->make(FertilizerFilter::class, ['queryParams' => array_filter
        ($data)]);

        $fertilizers_searches = Fertilizer::filter($filter)->get();

        $fertilizers = Fertilizer::all();

        $cultures = Culture::all();

        $deleted_fertilizers = Fertilizer::onlyTrashed()->get();

        return view('admin.fertilizer.index',
            compact('fertilizers', 'deleted_fertilizers',
                'fertilizers_searches', 'data', 'cultures'));
    }
}
