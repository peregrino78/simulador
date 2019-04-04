@extends('dashboard.templates.index')

@section('title', 'Permissões')

@section('content')

<form method="post" action="{{route('role_permissoes_store')}}">

  <div class="row">

    {{csrf_field()}}

    <input type="hidden" name="role" value="{{$role->id}}"/>

    <div class="col-sm-12">
        <div class="card-box">
            <button class="btn btn-success">Salvar</button>
        </div>
    </div>

    @foreach($resultados as $key => $resultado)

    <div class="col-sm-6">
        <div class="card-box">
            <h6 class="m-t-0">{{ $key }}</h6>
            <div class="table-responsive">
                <table class="table table-hover mails m-0 table table-actions-bar">
                    <thead>
                    <tr>
                        <th><input type="checkbox" class="checkAll" data-list=".{{str_slug($key)}}" id="{{str_slug($key)}}" value="1"/></th>
                        <th>Nome</th>
                        <th style="width:100px">Info</th>
                    </tr>
                    </thead>

                    <tbody>
                      @foreach($resultado as $permissao)

                        @php

                          $hasPermission = $role->permissions->filter(function($item) use($permissao) {
                              return $item->id == $permissao->id;
                          });

                        @endphp

                        <tr>
                            <td>
                                <input type="checkbox" name="permissoes[]" class="{{str_slug($key)}}" value="{{ $permissao->id }}" {{ $hasPermission->isNotEmpty() ? 'checked' : '' }}/>
                            </td>

                            <td>
                                {{ $permissao->slug }}
                            </td>

                            <td>
                              <button type="button" class="btn btn-default btn-sm" data-container="body" title="" data-toggle="popover" data-placement="right" data-content="{{ $permissao->description }}" data-original-title="" aria-describedby="popover688652">
                                  <i class="mdi mdi-information-variant"></i>
                              </button>
                            </td>
                        </tr>
                      @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @endforeach

  </div>

</form>

@stop

@section('js')

  <script>

      $(".checkAll").change(function() {

          var self = $(this);

          var itens = self.data('list');

          $.each($(itens), function(i, item) {

            if(self.is(':checked') === true) {
                item.checked = true;
            } else {
                item.checked = false;
            }

          });

      });

  </script>

@stop
