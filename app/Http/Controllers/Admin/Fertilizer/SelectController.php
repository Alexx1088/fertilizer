<?php

namespace App\Http\Controllers\Admin\Fertilizer;

use App\Http\Controllers\Controller;
use App\Http\Filters\FertilizerFilter;
use App\Http\Requests\Admin\Fertilizer\FilterRequest;
use App\Models\Fertilizer;

class SelectController extends Controller
{
   public function index(FilterRequest $request) {
       dd(1111);
       $data = $request->validated();
       $filter = app()->make(FertilizerFilter::class, ['queryParams' => array_filter
       ($data)]);

       $fertilizers1 = Fertilizer::filter($filter)->get();

       dd($fertilizers1);
   }
}
