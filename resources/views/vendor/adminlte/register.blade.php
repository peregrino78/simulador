@extends('adminlte::master')

@section('adminlte_css')
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/plugins/iCheck/square/blue.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/css/auth.css') }}">
    @yield('css')
@stop

@section('body_class', 'login-page')

@section('body')
<!--
  <section>
      <div class="container">
          <div class="row">
              <div class="col-sm-12">

                  <div class="wrapper-page">

                      <div class="m-t-40 card-box">
                          <div class="text-center">
                              <h2 class="text-uppercase m-t-0 m-b-30">
                                  <a href="#" class="text-success">
                                      <span><img src="{{ route('image',['link'=>\App\Helpers\Helper::config('logo-aplicacao')]) }}" alt="" height="30"></span>
                                  </a>
                              </h2>
                          </div>
                          <div class="account-content">

                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger">{{ $error }}</div>
                            @endforeach

                            <form action="{{ url(config('adminlte.register_url', 'register')) }}" method="post">
                                {!! csrf_field() !!}

                                <div class="form-group has-feedback {{ $errors->has('name') ? 'has-error' : '' }}">
                                    <input type="text" name="name" class="form-control" value="{{ old('name') }}"
                                           placeholder="{{ trans('adminlte::adminlte.full_name') }}">
                                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group has-feedback {{ $errors->has('email') ? 'has-error' : '' }}">
                                    <input type="email" name="email" class="form-control" value="{{ old('email') }}"
                                           placeholder="{{ trans('adminlte::adminlte.email') }}">
                                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group has-feedback {{ $errors->has('password') ? 'has-error' : '' }}">
                                    <input type="password" name="password" class="form-control"
                                           placeholder="{{ trans('adminlte::adminlte.password') }}">
                                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group has-feedback {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
                                    <input type="password" name="password_confirmation" class="form-control"
                                           placeholder="{{ trans('adminlte::adminlte.retype_password') }}">
                                    <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                                    @if ($errors->has('password_confirmation'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <button type="submit"
                                        class="btn btn-primary btn-block btn-flat"
                                >{{ trans('adminlte::adminlte.register') }}</button>
                            </form>

                              <div class="clearfix"></div>

                          </div>
                      </div>

                      <div class="row m-t-50">
                          <div class="col-sm-12 text-center">
                              <p class="text-muted"><a href="{{ route('login') }}" class="text-dark m-l-5">{{ trans('adminlte::adminlte.i_already_have_a_membership') }} </a></p>
                          </div>
                      </div>

                  </div>

              </div>
          </div>
      </div>
  </section>
-->

  @php

    

  @endphp

@stop

@section('adminlte_js')
    @yield('js')
@stop
