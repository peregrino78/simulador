<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\Helper;
use App\Models\Post;
use App\Mail\EnvioContato;
use App\Models\Proposta;
use SEO;

class HomeController extends Controller
{
    private $template;

    public function __construct()
    {
        $this->template = Helper::config('template-site');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        SEO::setTitle(\App\Helpers\Helper::config('nome-aplicacao'));
        SEO::setDescription(\App\Helpers\Helper::config('historia'));
        SEO::opengraph()->setUrl(config('app.url'));

        $banners = Helper::banners();
        $posts = Helper::posts();
        $portfolios = Helper::portfolios();

        return view('site.'.$this->template.'.index', compact('posts', 'banners', 'portfolios'));
    }

}
