@extends('dashboard.templates.edit')

@section('title', 'Editar Configuração')

@section('css')

    <link href="{{ asset('dashboard/plugins/summernote/summernote-bs4.css') }}" rel="stylesheet" />

@stop

@section('content')

<div class="row">
    <div class="col-sm-12">
        <div class="card-box">

            <form role="form" method="post" action="{{ route('configs.update', $config->id) }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <div class="box-body">
              <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $config->name }}">
              </div>

              <div class="form-group">
                <label for="nome">Descrição</label>
                <input type="text" class="form-control" id="description" name="description" value="{{ $config->description }}">
              </div>

              <div class="form-group{{ $errors->has('type_id') ? ' has-error' : '' }}">
                <label for="type_id">Tipo</label>
                <select class="form-control" id="type_id" name="type_id" placeholder="Tipo">
                  @foreach(\App\Models\Config\Type::all() as $item)
                      <option value="{{ $item->id }}" {{ $config->tipo->id == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                  @endforeach
                </select>
                @if ($errors->has('type_id'))
    							<span class="help-block">
    								<strong>{{ $errors->first('type_id') }}</strong>
    							</span>
    						@endif
              </div>

              @if($config->tipo->id == 1)
                <div class="form-group">
                  <label for="value">Valor</label>
                  <input type="text" class="form-control" id="value" name="value" value="{{ $config->value }}">
                </div>
              @elseif($config->tipo->id == 2)
                <div class="checkbox">
                  <label>
                    <input type="checkbox" name="value" value="1" {{ $config->value ? 'checked' : '' }}> Habilitado
                  </label>
                </div>
              @elseif($config->tipo->id == 3)
                <div class="form-group">
                  <label for="exampleInputFile">Valor</label>
                  <input type="file" class="form-control filestyle" data-size="md" data-buttontext="Selecione um arquivo" data-buttonname="btn-default" id="valor" name="value"/>
                </div>
              @elseif($config->tipo->id == 4)

              @elseif($config->tipo->id == 5)
                <div class="form-group">
                  <label for="value">Valor</label>
                  <textarea id="value" name="value" class="form-control summernote">{{ $config->value }}</textarea>
                </div>
              @endif

              <div class="checkbox">
                <label>
                  <input type="checkbox" name="active" value="1" {{ $config->active ? 'checked' : '' }}> Ativo
                </label>
              </div>
            </div>

            <div class="box-footer">
              <button type="submit" class="btn btn-success">Salvar</button>
            </div>
          </form>

        </div>
    </div>
</div>

@stop

@section('js')

  <script src="{{ asset('dashboard/plugins/summernote/summernote-bs4.min.js') }}"></script>

  <script type="text/javascript">
      $(document).ready(function() {
          $('.summernote').summernote({
              height: 250,
              width:'100%',                 // set editor height
              minHeight: null,             // set minimum height of editor
              maxHeight: null,             // set maximum height of editor
              focus: false                 // set focus to editable area after initializing summernote
          });
      });
  </script>

@stop
