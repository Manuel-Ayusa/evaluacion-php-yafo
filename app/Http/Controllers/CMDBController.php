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
    public function categorias(Request $request)
    {   
        $data = [
            'api_key' => config('services.api-aleph.api_key'),
            'categoria_id' => $request->idCategoria
        ];

        $response = Http::asForm()->post(config('services.api-aleph.url_entorno') . 'API/get_cmdb/', $data);

        $cmdb = $response['cmdb'];

        $categoria = $request->nombreCategoria;

        return view('CMDB.categorias', compact('cmdb', 'categoria'));
    }

    public function export(Request $request)
    {
        $data = [
            'api_key' => config('services.api-aleph.api_key'),
            'categoria_id' => $request->idCategoria
        ];

        $response = Http::asForm()->post(config('services.api-aleph.url_entorno') . 'API/get_cmdb/', $data);

        $cmdb = $response['cmdb'];

        $fecha = date('Y-m-d');

        $categoria = $request->nombreCategoria;

        $excel = Excel::store(new CMDBExport($cmdb), 'reportes/' . $categoria . '/'. $fecha . '.xls');

        if ($excel) {
            return redirect()->route('categorias.index')->with('info', 'Los registros de la categoria "' . $categoria . '" se exportaron con exito.'); 
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
        
        try {
            Excel::import(new CMDBImport, $request->file('file'));
        } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
            $failures = $e->failures();

            return back()->withErrors($failures);
        }

        return redirect()->route('categorias.index')->with('info', '¡Archivo importado con exito!'); 
    }

}
