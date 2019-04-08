@extends('dashboard.templates.create')

@section('title', 'Editar Coeficiente')

@section('content')

{!! Form::model('coefficient', ['route' => ['coeficientes.update', $coefficient->id], 'method' => 'put', 'class'=>'form-horizontal', 'role'=>'form', 'files' => true]) !!}
<div class="row">
    <div class="col-sm-12">
        <div class="card-box">
            <div class="tab-content">
                <div class="tab-pane active show" id="info-b2">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Informações do Coeficiente</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group {{ $errors->has('operation_type_id') ? ' has-error' : '' }}">
                                                <label class="col-form-label" for="operation_type_id">Operação</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fa fa-file-text-o"></i></span>
                                                    </div>
                                                    {{ Form::select('operation_type_id', $operations, $coefficient->operation_type_id, ['class' => 'form-control', 'placeholder' => 'Selecione']) }}
                                                </div>
                                                @if ($errors->has('operation_type_id'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('operation_type_id') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group {{ $errors->has('agreement_id') ? ' has-error' : '' }}">
                                                <label class="col-form-label" for="agreement_id">Convênio</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fa fa-list-ul"></i></span>
                                                    </div>
                                                    {{ Form::select('agreement_id', $agreements, $coefficient->agreement_id, ['class' => 'form-control', 'placeholder' => 'Selecione']) }}
                                                </div>
                                                @if ($errors->has('agreement_id'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('agreement_id') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group {{ $errors->has('term') ? ' has-error' : '' }}">
                                                <label class="col-form-label" for="term">Prazo</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fa fa-clock-o"></i></span>
                                                    </div>
                                                    {{ Form::text('term', $coefficient->term, ['class' => 'form-control', 'placeholder'=>'Informe o prazo']) }}
                                                </div>
                                                @if ($errors->has('term'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('term') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>                                   
                                        <div class="col-md-4">
                                            <div class="form-group {{ $errors->has('rate') ? ' has-error' : '' }}">
                                                <label class="col-form-label" for="rate">Taxa</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fa fa-percent"></i></span>
                                                    </div>
                                                    {{ Form::text('rate', $coefficient->rate, ['class' => 'form-control', 'placeholder'=>'Informe a taxa']) }}
                                                </div>
                                                @if ($errors->has('rate'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('rate') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>                                   
                                        <div class="col-md-4">
                                            <div class="form-group {{ $errors->has('factor') ? ' has-error' : '' }}">
                                                <label class="col-form-label" for="factor">Fator</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fa fa-line-chart"></i></span>
                                                    </div>
                                                    {{ Form::text('factor', $coefficient->factor, ['class' => 'form-control', 'placeholder'=>'Informe o fator']) }}
                                                </div>
                                                @if ($errors->has('factor'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('factor') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>    
                                        <div class="col-md-4">
                                            <div class="form-group {{ $errors->has('date') ? ' has-error' : '' }}">
                                                <label class="col-form-label" for="date">Data</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                                    </div>
                                                    {{ Form::date('date', $coefficient->date, ['class' => 'form-control', 'placeholder' => '00/00/0000']) }}
                                                </div>
                                                @if ($errors->has('date'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('date') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>                               
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-success">Salvar</button>
                </div>
            </div>
        </div>
    </div>
</div>
{!! Form::close() !!}

@endsection