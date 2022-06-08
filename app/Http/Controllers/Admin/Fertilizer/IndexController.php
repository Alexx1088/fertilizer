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

        if (isset($data['culture_group_ids'])){
            $culture_group_ids = $data['culture_group_ids'];
        }
        else {
            $culture_group_ids = null;
        }

        if (isset($data['districts'])){
            $districts = $data['districts'];
        }
        else {
            $districts = null;
        }

         $filter = app()->make(FertilizerFilter::class, ['queryParams' => array_filter
        ($data)]);

           $fertilizers_search = Fertilizer::filter($filter)->get();

        $fertilizers = Fertilizer::all();

        $deleted_fertilizers = Fertilizer::onlyTrashed()->get();

  //     $districts = Fertilizer::all('district');

                   return view('admin.fertilizer.index',
                 compact('fertilizers', 'deleted_fertilizers', 'districts',
                     'fertilizers_search', 'data', 'culture_group_ids'));
    }
}
