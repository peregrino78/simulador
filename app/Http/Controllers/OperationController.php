<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OperationController extends Controller
{
    public function redirectOperation($operation, $client)
    {
        $routName = '';
        if($operation == 1)
        {
            //$routName = 'simulacao_contrato_novo';
            return redirect()->route('simulacao_contrato_novo', $client);
        }
        if($operation == 2)
        {
            $routName = 'simulacao_portabilidade';
        }
        if($operation == 3)
        {
            $routName = 'simulacao_refin';
        }
        if($operation == 4)
        {
            $routName = 'simulacao_refin_portabilidade';
        }

  
        return redirect()->route($routName, $client);
    }

    
    public function contratoNovoCreate()
    {dd('entrou');
        return view('dashboard.operations.contrato-novo');
    }

    public function portabilidadeCreate()
    {
        return view('dashboard.operations.portabilidade');
    }

    public function refinCreate()
    {
        return view('dashboard.operations.refin');
    }

    public function refinPortabilidadecreate()
    {
        return view('dashboard.operations.refin-portabilidade');
    }
}
