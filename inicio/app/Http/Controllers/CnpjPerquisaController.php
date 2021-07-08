<?php

namespace App\Http\Controllers;

use App\CnpjPerquisa;
use Illuminate\Http\Request;

class CnpjPerquisaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cnpj.index');
    }

    public function store(Request $request)
    {
        $cnpjPesquisa = new CnpjPerquisa();

        $resultado = $cnpjPesquisa->retornoImediato($request->pesquisa);


        if($resultado != 'error'){
            try {
                $client = 'https://www.receitaws.com.br/v1/cnpj/' . $resultado;
                $cnpj = json_encode(file_get_contents($client));
                $cnpj = json_decode($cnpj);
            } catch (\Throwable $th) {
                return view('cnpj.index');
            }
        } else {
            $info = "CNPJ inválido. Informe o CNPJ verdadeiro.";
            return view('cnpj.index', compact('info'));
        }

        return view('cnpj.resultado', compact('cnpj'));
        //dd($resultado);
    }


}
