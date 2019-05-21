<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PortabilityController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.operations.portabilidade.create');
    }
}
