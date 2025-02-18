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
        return array_keys($this->array[0]);
    }
}
