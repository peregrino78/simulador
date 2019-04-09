@extends('dashboard.templates.create')

@section('title', 'Simulação - Dados da Simulação')

@section('content')

{!! Form::open(['route' => 'simulacao.store', 'method' => 'post', 'class'=>'form-horizontal', 'role'=>'form', 'files' => true]) !!}
<div class="row">
    <div class="col-sm-12">
        <div class="card-box">
              <div class="tab-content">
                <div class="tab-pane active show" id="info-b2">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Informe os Dados do Cliente</h3>
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
                                                    {{ Form::select('operation_type_id', $operations, null, ['class' => 'form-control', 'placeholder' => 'Selecione']) }}
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
                                                    {{ Form::select('agreement_id', $agreements, null, ['class' => 'form-control', 'placeholder' => 'Selecione']) }}
                                                </div>
                                                @if ($errors->has('agreement_id'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('agreement_id') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group {{ $errors->has('balance_due') ? ' has-error' : '' }}">
                                                <label class="col-form-label" for="balance_due">Saldo Devedor</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fa fa-money"></i></span>
                                                    </div>
                                                    {{ Form::text('balance_due', null, ['class' => 'form-control', 'placeholder'=>'Informe o saldo']) }}
                                                </div>
                                                @if ($errors->has('balance_due'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('balance_due') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group {{ $errors->has('contract_term') ? ' has-error' : '' }}">
                                                <label class="col-form-label" for="contract_term">Prazo do Contrato</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fa fa-clock-o"></i></span>
                                                    </div>
                                                    {{ Form::text('contract_term', null, ['class' => 'form-control', 'placeholder'=>'Informe o prazo']) }}
                                                </div>
                                                @if ($errors->has('contract_term'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('contract_term') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group {{ $errors->has('paid_parcels') ? ' has-error' : '' }}">
                                                <label class="col-form-label" for="paid_parcels">Parcelas Pagas</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fa fa-arrow-circle-down"></i></span>
                                                    </div>
                                                    {{ Form::text('paid_parcels', null, ['class' => 'form-control', 'placeholder'=>'parcelas']) }}
                                                </div>
                                                @if ($errors->has('paid_parcels'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('paid_parcels') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group {{ $errors->has('open_parcels') ? ' has-error' : '' }}">
                                                <label class="col-form-label" for="open_parcels">Parcelas Abertas</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fa fa-arrow-circle-up"></i></span>
                                                    </div>
                                                    {{ Form::text('open_parcels', null, ['class' => 'form-control', 'placeholder'=>'parcelas']) }}
                                                </div>
                                                @if ($errors->has('open_parcels'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('open_parcels') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group {{ $errors->has('current_parcel_value') ? ' has-error' : '' }}">
                                                <label class="col-form-label" for="current_parcel_value">Valor da Parcela Atual</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fa fa-arrow-down"></i></span>
                                                    </div>
                                                    {{ Form::text('current_parcel_value', null, ['class' => 'form-control', 'placeholder'=>'valor']) }}
                                                </div>
                                                @if ($errors->has('current_parcel_value'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('current_parcel_value') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group {{ $errors->has('desired_parcel') ? ' has-error' : '' }}">
                                                <label class="col-form-label" for="desired_parcel">Valor da Parcela Desejada</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fa fa-arrow-up"></i></span>
                                                    </div>
                                                    {{ Form::text('desired_parcel', null, ['class' => 'form-control', 'placeholder'=>'valor']) }}
                                                </div>
                                                @if ($errors->has('desired_parcel'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('desired_parcel') }}</strong>
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
                                                    {{ Form::date('date', null, ['class' => 'form-control', 'placeholder' => '00/00/0000']) }}
                                                </div>
                                                @if ($errors->has('date'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('date') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <input type="hidden" value="{{$client_id}}" name="client_id">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-success">Simular</button>
                </div>
            </div>
        </div>
    </div>
</div>
{!! Form::close() !!}

@endsection