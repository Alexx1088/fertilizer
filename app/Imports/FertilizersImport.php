<?php

namespace App\Imports;

use App\Models\Fertilizer;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class FertilizersImport
    implements ToCollection, WithHeadingRow, WithValidation
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
                    'name' => $item['naimenovanie'],
                    'nitrogen_rate' => $item['norma_azot'],
                    'phosphorus_rate' => $item['norma_fosfor'],
                    'potassium_rate' => $item['norma_kalii'],
                    'culture_group_id' => $item['kultura_id'],
                    'district' => $item['raion'],
                    'price' => $item['stoimost'],
                    'description' => $item['opisanie'],
                    'destination' => $item['naznacenie'],
                ]);
            }
        }
    }
           public function rules(): array
           {
               return [
               //    'name' => 'required|name|string:fertilizers',
                   'name' => 'string',
                   'nitrogen_rate' => 'decimal',
                   'phosphorus_rate' => 'decimal',

              //     '*.name' => 'required|name|string:fertilizers',
                   '*.name' => 'string',
                   '*.nitrogen_rate' => 'decimal',
                   '*.phosphorus_rate' => 'decimal',

               /*    '*.name' => 'required',
                   // Above is alias for as it always validates in batches
                   '*.name' => Rule::in(['patrick@maatwebsite.nl']),*/
               ];
           }

}
