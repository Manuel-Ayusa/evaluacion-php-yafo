<?php

namespace App\Http\Controllers;

use App\Exports\CMDBExport;
use App\Imports\CMDBImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Excel as ExcelExcel;

class CMDBController extends Controller
{
    public function categorias(int $id)
    {   
        $data = [
            'api_key' => config('services.api-aleph.api_key'),
            'categoria_id' => $id
        ];

        $response = Http::asForm()->post(config('services.api-aleph.url_entorno') . 'API/get_cmdb/', $data);

        $cmdb = $response['cmdb'];

        return view('CMDB.categorias', compact('cmdb'));
    }

    public function export(int $id)
    {
        $data = [
            'api_key' => config('services.api-aleph.api_key'),
            'categoria_id' => $id
        ];

        $response = Http::asForm()->post(config('services.api-aleph.url_entorno') . 'API/get_cmdb/', $data);

        $cmdb = $response['cmdb'];

        $fecha = date('Y-m-d');

        $excel = Excel::store(new CMDBExport($cmdb), 'reportes/' . request('categoria') . '/'. $fecha . '.xls');

        if ($excel) {
            return redirect()->route('categorias.index')->with('info', 'Los registros de la categoria "' . request('categoria') . '" se exportaron con exito.'); 
        } else {
            return redirect()->route('categorias.index')->with('info', 'Algo falló.');
        }
    }

    public function create()
    {
        return view('CMDB.create');
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xls,xlsx'
        ]);
        
        Excel::import(new CMDBImport, $request->file('file'));

        return redirect()->route('categorias.index')->with('info', '¡Archivo importado con exito!'); 
    }

}
