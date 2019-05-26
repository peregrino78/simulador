{!! Form::open(['route' => 'contrato-novo.store', 'method' => 'post', 'class'=>'form-horizontal', 'role'=>'form', 'files' => true]) !!}
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Valor do Empréstimo</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6">
                            <input type="hidden" name="operation" value="2" hidden>
                            <div class="form-group {{ $errors->has('operation_type_id') ? ' has-error' : '' }}">
                                <label class="col-form-label" for="operation_type_id">Operação</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-file-text-o"></i></span>
                                    </div>
                                    {{ Form::select('operation_type_id', $operations, 1, ['class' => 'form-control', 'readonly' => 'true']) }}
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
                            <div class="form-group {{ $errors->has('desired_parcel') ? ' has-error' : '' }}">
                                <label class="col-form-label" for="desired_parcel">Valor Parcela Desejada</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-money"></i></span>
                                    </div>
                                    {{ Form::text('desired_parcel', null, ['class' => 'form-control', 'placeholder'=>'Informe o valor']) }}
                                </div>
                                @if ($errors->has('desired_parcel'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('desired_parcel') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group {{ $errors->has('parcels_quantity') ? ' has-error' : '' }}">
                                <label class="col-form-label" for="parcels_quantity">Quantidade de Parcelas</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-list-ol"></i></span>
                                    </div>
                                    {{ Form::text('parcels_quantity', null, ['class' => 'form-control', 'placeholder'=>'Informe a quantidade']) }}
                                </div>
                                @if ($errors->has('parcels_quantity'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('parcels_quantity') }}</strong>
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
{!! Form::close() !!}