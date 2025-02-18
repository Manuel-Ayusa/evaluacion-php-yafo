<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;
use Maatwebsite\Excel\Concerns\ToCollection;

class CMDBImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        foreach ($collection as $key => $row) {
            Http::asForm()->post(config('services.api-aleph.url_entorno') . '/API/insert_cmdb', [
                'api_key' => config('services.api-aleph.api_key'),
                'identificador' => $row[0], 
                'nombre' => $row[1],
                'categoria_id' => $row[4],
            ]);
        }
    }
}
