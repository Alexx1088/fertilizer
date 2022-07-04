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
          foreach ($collection as $item) {
          if (isset($item['naimenovanie']) && $item['naimenovanie'] != null) {
              $value = $item['data_dogovora'];
              $date = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value);

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
