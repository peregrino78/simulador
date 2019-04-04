<?php

namespace App\Http\Middleware;

use Closure;
use Config;
use Auth;
use Redirect;

class SetUpConfigs
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::check() && Auth::user() && !Auth::user()->active) {
            Auth::logout();
            return Redirect::route('login')->withErrors('O Usuário está desativado, entre em contato com o Administrador.');
        }

        if(!Config::get(\App\Helpers\Helper::config('mail-username'))) {
            Config::set('mail.username', \App\Helpers\Helper::config('mail-username'));
            Config::set('mail.password', \App\Helpers\Helper::config('mail-password'));
            Config::set('mail.port', \App\Helpers\Helper::config('mail-port'));
            Config::set('mail.driver', \App\Helpers\Helper::config('mail-driver'));
            Config::set('mail.host', \App\Helpers\Helper::config('mail-host'));
            Config::set('mail.encryption', \App\Helpers\Helper::config('mail-encryption'));
            Config::set('app.name', \App\Helpers\Helper::config('nome-aplicacao'));
        }

        return $next($request);
    }
}
