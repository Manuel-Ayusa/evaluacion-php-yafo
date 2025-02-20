<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CMDBImport implements ToCollection, WithValidation, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {   
        // Si no hay filas, lanzar una excepción
        if ($collection->isEmpty()) {
            throw new \Exception('El archivo Excel está vacío.');
        }

        foreach ($collection as $key => $row) {

            $data['api_key'] = config('services.api-aleph.api_key'); //se inicializa el array con 'api_key' para la petición a la API

            foreach ($row as $key => $value) {

                $data[$key] = $value; //se agregan los valores con sus respectivas llaves

            }

            Http::asForm()->post(config('services.api-aleph.url_entorno') . '/API/insert_cmdb', $data); //se manda la petición a la API para que los registros se guarden o actualicen
        }
    }

    public function rules(): array
    {
        return [
            'identificador' => 'required',
            'nombre' => 'required',
        ];
    }
}
