<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class CMDBExport implements FromArray, WithHeadings
{
    private $array;

    function __construct(array $array)
    {
        $this->array = $array;
    }

    /**
    * @return Array
    */
    public function array(): array
    {
        return $this->array;
    }

    public function headings(): array
    {
        //si el array contiene encabezados los retorna en un array, de lo contrario retorna un array vacio
        if (isset($this->array[0])) {
            return array_keys($this->array[0]);
        } else {
            return [];
        }
    }
}
