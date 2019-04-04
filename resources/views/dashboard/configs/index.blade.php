@extends('dashboard.templates.index')

@section('title', 'Configurações')

@section('content')

@permission('create.aplicacao')
<!--
<div class="row">
    <div class="col-sm-12">
        <div class="card-box">
          <a href="{{ route('configs.create') }}" class="btn btn-success">Novo</a>
        </div>
    </div>
</div>
-->
@endpermission

<div class="row">
    @foreach($grupos as $grupo)
        <div class="col-lg-12">
            <div class="panel panel-color panel-custom">
                <div class="panel-heading">
                    <h3 class="panel-title">{{ $grupo->name }}</h3>
                </div>
                <div class="panel-body">

                  <div class="row">

                    @foreach($grupo->configs as $config)

                      <div class="col-sm-4">
                          <div class="card-box">
                              <i class="fa fa-info-circle text-muted pull-right inform" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="{{ $config->descricao }}"></i>

                              <h6 class="text-muted font-13 m-t-0 text-uppercase">{{ $config->name }}</h6>
                              <p class="m-b-20 mt-3"><span>@if(strlen($config->value) < 150)

                                @if($config->type_id == 3)
                                  <img width="64" src="{{ route('image',['link'=>$config->value]) }}" class="img-thumbnail" alt="">
                                @else
                                    {{ $config->value }}
                                @endif


                              @else
                                  {{ 'Texto longo' }}
                              @endif</span></p>

                              <p class="m-b-20 mt-3">

                                @permission('edit.aplicacao')
                                  <a href="{{ route('configs.edit', $config->id) }}" class="btn btn-sm btn-default pull-right"><i class="fa fa-edit"></i></a>
                                @endpermission

                              </p>


                          </div>
                      </div>

                    @endforeach

                  </div>

                </div>
            </div>
        </div>
    @endforeach
</div>

@stop
