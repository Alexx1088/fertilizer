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

//dd($data);
        /* if ($data['name'] == null) {
              dd(111);
          }*/
        /*
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
                }*/

        $filter = app()->make(FertilizerFilter::class, ['queryParams' => array_filter
        ($data)]);
        //  dd($filter);

        $fertilizers_searches = Fertilizer::filter($filter)->get();

        //   dd($fertilizers_searches);

        $fertilizers = Fertilizer::all();

        $cultures = Culture::all();

        $deleted_fertilizers = Fertilizer::onlyTrashed()->get();

        //     $districts = Fertilizer::all('district');

        return view('admin.fertilizer.index',
            compact('fertilizers', 'deleted_fertilizers', /*'districts',*/
                'fertilizers_searches', 'data', 'cultures'));
    }
}
