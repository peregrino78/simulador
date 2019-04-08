@extends('dashboard.templates.create')

@section('title', 'Visualizar Convênio')

@section('content')

{!! Form::model('agreement', ['route' => ['convenio.update', $agreement->id], 'method' => 'put', 'class'=>'form-horizontal', 'role'=>'form', 'files' => true]) !!}
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
                                            <label class="col-form-label" for="nome">Nome</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-user"></i></span>
                                                </div>
                                                {{ Form::text('name', $agreement->name, ['class' => 'form-control', 'placeholder'=>'Informe o nome', 'disabled' => 'disabled']) }}
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <label class="col-form-label" for="nome">Descrição</label>
                                            <div class="input-group">
                                                {{ Form::textarea('description', $agreement->particularities->description, ['class' => 'form-control summernoteDisable', 'disabled' => 'disabled']) }}
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="col-form-label" for="nome">Limite de Idade</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-exclamation"></i></span>
                                                </div>
                                                {{ Form::number('age_limit', $agreement->particularities->age_limit, ['class' => 'form-control', 'placeholder'=>'Limite de idade', 'disabled' => 'disabled']) }}
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="col-form-label" for="nome">Limite de Parcelas</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-exclamation"></i></span>
                                                </div>
                                                {{ Form::number('parcel_limit', $agreement->particularities->parcel_limit, ['class' => 'form-control', 'placeholder'=>'Limite de parcelas', 'disabled' => 'disabled']) }}
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