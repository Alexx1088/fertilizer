<?php

namespace App\Imports;

use App\Models\Client;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ClientsImport implements ToCollection, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
    //    dd($collection);
       foreach ($collection as $item) {
          if (isset($item['naimenovanie']) && $item['naimenovanie'] != null) {
              $value = $item['data_dogovora'];
              $date = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value);
         //     dd($date);

              Client::firstOrCreate([
                  'name' => $item['naimenovanie'],
], [
'name'=> $item['naimenovanie'],
/*'agreement_date'=> $item['data_dogovora'],*/
'agreement_date'=> $date,
'delivery_cost'=> $item['stoimost_postavki'],
'region'=> $item['region'],
              ]);
          }
       }
    }
}
