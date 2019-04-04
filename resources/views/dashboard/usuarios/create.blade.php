@extends('dashboard.templates.create')

@section('title', 'Novo Usuário')

@section('content')

<div class="row">
    <div class="col-sm-12">
        <div class="card-box">

          <form method="post" action="{{ route('users.store') }}" role="form" enctype="multipart/form-data">

              {{ csrf_field() }}

              <div class="row">
                  <div class="col-md-4">
                      <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                          <label class="col-form-label" for="name">Nome</label>
                          <div class="input-group">
                              <div class="input-group-prepend">
                                  <span class="input-group-text"><i class="fa fa-user"></i></span>
                              </div>
                              <input type="text" id="name" required name="name" class="form-control" value="{{ old('name') }}">

                          </div>
                          @if ($errors->has('name'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('name') }}</strong>
                              </span>
                          @endif
                      </div>
                  </div>

                  <div class="col-md-4">
                      <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                          <label class="col-form-label" for="email">Email</label>
                          <div class="input-group">
                              <div class="input-group-prepend">
                                  <span class="input-group-text"><i class="fa fa-at"></i></span>
                              </div>
                              <input type="email" id="nome" required name="email" class="form-control" value="{{ old('email') }}">

                          </div>
                          @if ($errors->has('email'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('email') }}</strong>
                              </span>
                          @endif
                      </div>
                  </div>

                  <div class="col-md-4">
                      <div class="form-group">
                          <label class="col-form-label" for="avatar">Avatar</label>
                          <div class="input-group">
                              <input type="file" name="avatar" class="form-control filestyle" data-buttontext="Selecionar Imagem" data-buttonname="btn-success">
                          </div>
                      </div>
                  </div>

                  <div class="col-md-4">
                      <div class="form-group {{ $errors->has('role') ? ' has-error' : '' }}">
                          <label class="col-form-label" for="role">Roles</label>
                          <div class="input-group">
                              <div class="input-group-prepend">
                                  <span class="input-group-text"><i class="fa fa-at"></i></span>
                              </div>
                              <select class="form-control" name="role">
                                @foreach($roles as $role)
                                  <option value="{{ $role->id }}" {{ old('role') }}>{{ $role->name }}</option>
                                @endforeach
                              </select>

                          </div>
                          @if ($errors->has('email'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('email') }}</strong>
                              </span>
                          @endif
                      </div>
                  </div>

                  <div class="col-md-4">
                      <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                          <label class="col-form-label" for="password">Senha</label>
                          <div class="input-group">
                              <div class="input-group-prepend">
                                  <span class="input-group-text"><i class="fa fa-key"></i></span>
                              </div>
                              <input type="password" id="password" required name="password" class="form-control" autocomplete="off">

                          </div>
                          @if ($errors->has('password'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('password') }}</strong>
                              </span>
                          @endif
                      </div>
                  </div>

                  <div class="col-md-4">
                      <div class="form-group {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                          <label class="col-form-label" for="password_confirmation">Confirmar Senha</label>
                          <div class="input-group">
                              <div class="input-group-prepend">
                                  <span class="input-group-text"><i class="fa fa-key"></i></span>
                              </div>
                              <input type="password" id="password_confirmation" required name="password_confirmation" class="form-control" autocomplete="off">

                          </div>
                          @if ($errors->has('password_confirmation'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('password_confirmation') }}</strong>
                              </span>
                          @endif
                      </div>
                  </div>

                  <div class="col-md-12">
                    <div class="form-group">
                        <label class="col-form-label" for="creci">Ativo</label>
                        <input type="checkbox" id="ativo" name="active" checked class="form-control" value="1">
                    </div>
                  </div>

              </div>

              <button class="btn btn-success">
                  Salvar
              </button>

          </fom>

        </div>
    </div>
</div>

@stop
