@extends('dashboard.templates.create')

@section('title', 'Simulação - dados do Cliente')

@section('content')

    {!! Form::open(['route' => 'dados-cliente.store', 'method' => 'post', 'class'=>'form-horizontal', 'role'=>'form', 'files' => true]) !!}
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <div class="tab-content">
                    <div class="tab-pane active show" id="info-b2">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Informe os Dados Pessoais do Cliente</h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <input type="hidden" name="operation" value="{{$request->op}}" hidden>
                                            <div class="col-md-6">
                                                <div class="form-group {{ $errors->has('cpf') ? ' has-error' : '' }}">
                                                    <label class="col-form-label" for="cpf">CPF</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fa fa-id-card-o"></i></span>
                                                        </div>
                                                        {{ Form::text('cpf', null, ['class' => 'form-control cpf', 'placeholder'=>'Informe CPF']) }}
                                                    </div>
                                                    @if ($errors->has('cpf'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('cpf') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                                                    <label class="col-form-label" for="nome">Nome</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fa fa-user"></i></span>
                                                        </div>
                                                        {{ Form::text('name', null, ['class' => 'form-control', 'placeholder'=>'Informe o nome']) }}
                                                    </div>
                                                    @if ($errors->has('name'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('name') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group {{ $errors->has('birthday') ? ' has-error' : '' }}">
                                                    <label class="col-form-label" for="date">Data de Nascimento</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                                        </div>
                                                        {{ Form::date('birthday', null, ['class' => 'form-control', 'placeholder' => '00/00/0000']) }}
                                                    </div>
                                                    @if ($errors->has('birthday'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('birthday') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group {{ $errors->has('state_id') ? ' has-error' : '' }}">
                                                    <label class="col-form-label" for="state_id">Estado</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fa fa-map"></i></span>
                                                        </div>
                                                        {{ Form::select('state_id', $states, null, ['class' => 'form-control', 'placeholder'=>'Selecione']) }}
                                                    </div>
                                                    @if ($errors->has('state_id'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('state_id') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group {{ $errors->has('city_id') ? ' has-error' : '' }}">
                                                    <label class="col-form-label" for="city_id">Cidade</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fa fa-map"></i></span>
                                                        </div>
                                                        {{ Form::select('city_id', ['' => 'Selecione'], null, ['class' => 'form-control', 'placeholder'=>'Selecione']) }}
                                                    </div>
                                                    @if ($errors->has('city_id'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('city_id') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>                                 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-success">Avançar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}

@endsection

@section('js')
	<script>
		(function () {
			var previous;
			var stateId = 0;
			$("select[name=state_id]").focus(function () {
				previous = this.value;
			}).change(function() {
				var stateId = this.value;
				
				$.get("{{route('get-cities')}}/"  + stateId, function (city) {
					$('select[name=city_id]').empty();
					$.each(city, function (key, value) {
						$('select[name=city_id]').append('<option value=' + value.id + '>' + value.name + '</option>');
					});
				});
			});
		})();
    </script>
@endsection