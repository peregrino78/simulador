<?php

namespace App\Http\Controllers;

use App\Models\Agreement;
use Illuminate\Http\Request;
use App\Models\OperationType;

class PortabilityController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $client_id = $id;
        $agreements = Agreement::pluck('name', 'id');
        $operations = OperationType::pluck('name', 'id');
        
        return view('dashboard.operations.portabilidade.create', compact('agreements', 'operations', 'client_id'));
    }
}
