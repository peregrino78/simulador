@extends('dashboard.templates.create')

@section('title', 'Simulação - Contrato Novo')

@section('content')

<div class="row">
    <div class="col-sm-12">
        <div class="card-box">
            <ul class="nav nav-tabs tabs-bordered nav-justified">
                <li class="nav-item">
                    <a href="#valorParcela" data-toggle="tab" aria-expanded="false" class="nav-link active show">
                        Valor Parcela
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#valorEmprestimo" data-toggle="tab" aria-expanded="false" class="nav-link">
                        Valor Empréstimo
                    </a>
                </li>
            </ul>
			<div class="tab-content">
				<div class="tab-pane active show" id="valorParcela">
					@include('dashboard.operations.contrato-novo.valor-parcela')
                </div>
				<div class="tab-pane" id="valorEmprestimo">
					@include('dashboard.operations.contrato-novo.valor-emprestimo')
				</div>
			</div>
        </div>
    </div>
</div>

@endsection