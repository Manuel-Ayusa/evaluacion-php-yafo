<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CategoryController extends Controller
{
    public function index()
    {       
        $data = [
            'api_key' => config('services.api-aleph.api_key')
        ];

        $response = Http::asForm()->post(config('services.api-aleph.url_entorno') . 'API/get_categorias/', $data);

        $categorias = $response['categorias'];

        return view('categories.index', compact('categorias'));
    }
}
