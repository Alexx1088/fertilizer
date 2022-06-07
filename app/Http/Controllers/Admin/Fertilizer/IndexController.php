<?php

namespace App\Http\Controllers\Admin\Fertilizer;

use App\Http\Controllers\Controller;
use App\Http\Filters\FertilizerFilter;
use App\Http\Requests\Admin\Fertilizer\FilterRequest;
use App\Models\Fertilizer;

class IndexController extends Controller
{

    public function __invoke(FilterRequest $request)
    {
       $data = $request->validated();
      //  dd($data);
         $filter = app()->make(FertilizerFilter::class, ['queryParams' => array_filter
        ($data)]);

           $fertilizers_search = Fertilizer::filter($filter)->get();

        $fertilizers = Fertilizer::all();

        $deleted_fertilizers = Fertilizer::onlyTrashed()->get();

        $districts = Fertilizer::all('district');

       //      $cultures_groups = Fertilizer::all('culture_group_id', 'id');

             return view('admin.fertilizer.index',
                 compact('fertilizers', 'deleted_fertilizers', 'districts',
                     'fertilizers_search', 'data', ));
    }
}
