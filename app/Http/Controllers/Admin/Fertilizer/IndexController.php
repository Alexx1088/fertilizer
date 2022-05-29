<?php

namespace App\Http\Controllers\Admin\Fertilizer;

use App\Http\Controllers\Controller;
use App\Http\Filters\FertilizerFilter;
use App\Http\Requests\Admin\Fertilizer\FilterRequest;
use App\Models\Fertilizer;
use Illuminate\Support\Facades\Request;
use function Doctrine\Common\Cache\Psr6\get;

class IndexController extends Controller
{

    public function __invoke(FilterRequest $request)
    {
       $data = $request->validated();

        $filter = app()->make(FertilizerFilter::class, ['queryParams' => array_filter
        ($data)]);

        $fertilizers1 = Fertilizer::filter($filter)->get();

     // dd($fertilizers1);

        $fertilizers = Fertilizer::all();

        $deleted_fertilizers = Fertilizer::onlyTrashed()->get();

        $districts = Fertilizer::all('district');

             return view('admin.fertilizer.index',
                 compact('fertilizers', 'deleted_fertilizers', 'districts'));
    }
}