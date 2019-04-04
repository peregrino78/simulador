<?php

namespace App\Helpers;

use App\Models\Config;

class Helper
{
    public static function config($slug)
    {
        $data =session()->forget($slug);
        $data = session()->get($slug);

        if(!$data) {

          $config = Config::where('slug', $slug)->get();

          if($config->isNotEmpty()) {
            $data = $config->first()->value;
          }

          session()->put($slug, $data);

        }

        return $data;
    }

    public static function configData($slug)
    {
        $key = $slug.'data';

        $data = session()->forget($key);
        $data = session()->get($key);

        if(!$data) {

          $config = Config::where('slug', $slug)->get();

          if($config->isNotEmpty()) {
            $data = $config->first();
          }

          session()->put($key, $data);

        }

        return $data;
    }
}
