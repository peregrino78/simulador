@extends('dashboard.templates.create')

@section('title', 'Novo Convênio')

@section('content')

{!! Form::open(['route' => 'convenio.store', 'method' => 'post', 'class'=>'form-horizontal', 'role'=>'form', 'files' => true]) !!}
<div class="row">
    <div class="col-sm-12">
        <div class="card-box">
              <div class="tab-content">
                <div class="tab-pane active show" id="info-b2">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Informações do Convênio</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-12">
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
                                        <div class="col-md-12">
                                            <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
                                                <label class="col-form-label" for="nome">Descrição</label>
                                                <div class="input-group">
                                                    {{ Form::textarea('description', null, ['class' => 'form-control summernote']) }}
                                                </div>
                                                @if ($errors->has('description'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('description') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group {{ $errors->has('age_limit') ? ' has-error' : '' }}">
                                                <label class="col-form-label" for="nome">Limite de Idade</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fa fa-exclamation"></i></span>
                                                    </div>
                                                    {{ Form::number('age_limit', null, ['class' => 'form-control', 'placeholder'=>'Limite de idade']) }}
                                                </div>
                                                @if ($errors->has('age_limit'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('age_limit') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group {{ $errors->has('parcel_limit') ? ' has-error' : '' }}">
                                                <label class="col-form-label" for="nome">Limite de Parcelas</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fa fa-exclamation"></i></span>
                                                    </div>
                                                    {{ Form::number('parcel_limit', null, ['class' => 'form-control', 'placeholder'=>'Limite de parcelas']) }}
                                                </div>
                                                @if ($errors->has('parcel_limit'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('parcel_limit') }}</strong>
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