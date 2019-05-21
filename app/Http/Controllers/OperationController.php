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
            $routName = 'simulacao_contrato_novo';
        }
        if($operation == 2)
        {
            $routName = 'simulacao_portabilidade';
        }
        if($operation == 4)
        {
            $routName = 'simulacao_refin_portabilidade';
        }
        
        return redirect()->route($routName, ['id' => $client]);
    }    
}
