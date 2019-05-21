<?php

namespace App\Http\Controllers;

use App\Models\Agreement;
use Illuminate\Http\Request;
use App\Models\OperationType;

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
        if($operation == 3)
        {
            $routName = 'simulacao_refin';
        }
        
        return redirect()->route($routName, ['id' => $client]);
    }
    
    public function contratoNovoCreate()
    {
        return view('dashboard.operations.contrato-novo');
    }

    public function portabilidadeCreate()
    {
        return view('dashboard.operations.portabilidade');
    }

    public function refinCreate($id)
    {
        $client_id = $id;
        $agreements = Agreement::pluck('name', 'id');
        $operations = OperationType::pluck('name', 'id');
        
        return view('dashboard.operations.refin', compact('agreements', 'operations', 'client_id'));
    }
}
