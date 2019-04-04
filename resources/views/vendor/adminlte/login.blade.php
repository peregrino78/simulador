@extends('adminlte::master')

@section('adminlte_css')
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/plugins/iCheck/square/blue.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/css/auth.css') }}">
    @yield('css')
@stop

@section('body_class', 'login-page')

@section('body')

  <section>
      <div class="container">
          <div class="row">
              <div class="col-sm-12">

                  <div class="wrapper-page">

                      <div class="m-t-40 card-box">
                          <div class="text-center">
                              <h2 class="text-uppercase m-t-0 m-b-30">
                                  <a href="#" class="text-success">
                                    @if ( \App\Helpers\Helper::configData('logo-aplicacao')->active )
                                        <span><img src="{{ route('image',['link'=>\App\Helpers\Helper::config('logo-aplicacao')]) }}" alt="" height="100"></span>
                                    @else
                                        <span><img src="{{ asset('/dashboard/images/pac_contact_logo.png') }}" alt="" height="100"></span>
                                    @endif
                                  </a>
                              </h2>
                          </div>
                          <div class="account-content">

                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger">{{ $error }}</div>
                            @endforeach

                              <form action="{{ url(config('adminlte.login_url', 'login')) }}" class="form-horizontal" method="post">
                                  {!! csrf_field() !!}
                                  <div class="form-group m-b-20 {{ $errors->has('login') ? ' has-error' : '' }}">
                                      <div class="col-xs-12">
                                          <label for="emailaddress">{{ trans('adminlte::adminlte.email') }}</label>
                                          <input class="form-control" name="email" type="text" id="emailaddress" value="{{ old('email') }}" required="" placeholder="" autofocus>
                                      </div>
                                  </div>

                                  <div class="form-group m-b-20 {{ $errors->has('password') ? ' has-error' : '' }}">
                                      <div class="col-xs-12">
                                          <label for="password">{{ trans('adminlte::adminlte.password') }}</label>
                                          <input class="form-control" name="password" type="password" required="" id="password" placeholder="">
                                      </div>
                                  </div>

                                  <div class="form-group m-b-30">
                                      <div class="col-xs-12">
                                          <div class="checkbox checkbox-primary">
                                              <input id="checkbox5" type="checkbox">
                                              <label for="checkbox5">
                                                  {{ trans('adminlte::adminlte.remember_me') }}
                                              </label>
                                          </div>
                                      </div>
                                  </div>

                                  <div class="form-group account-btn text-center m-t-10">
                                      <div class="col-xs-12">
                                          <button class="btn btn-lg btn-primary btn-block" type="submit">{{ trans('adminlte::adminlte.sign_in') }}</button>
                                      </div>
                                  </div>

                              </form>

                              <div class="clearfix"></div>

                          </div>
                      </div>

                  </div>

              </div>
          </div>
      </div>
  </section>

@stop

@section('adminlte_js')
    @yield('js')
@stop
