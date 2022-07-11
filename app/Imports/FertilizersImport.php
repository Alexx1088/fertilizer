<?php

namespace App\Imports;

use App\Models\Fertilizer;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class FertilizersImport
    implements ToCollection, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
       foreach ($collection as $item) {
          if (isset($item['naimenovanie']) && $item['naimenovanie'] != null) {

              Fertilizer::firstOrCreate([
                  'name' => $item['naimenovanie'],
], [
'name'=> $item['naimenovanie'],
'nitrogen_rate'=> $item['norma_azot'],
'phosphorus_rate'=> $item['norma_fosfor'],
'potassium_rate'=> $item['norma_kalii'],
'culture_group_id'=> $item['kultura_id'],
'district'=> $item['raion'],
'price'=> $item['stoimost'],
'description'=> $item['opisanie'],
'destination'=> $item['naznacenie'],

              ]);

          }
       }
    }
}
