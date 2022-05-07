<?php

namespace App\Install;

use App\Setting;
use Illuminate\Support\Facades\Artisan;
use Jackiedo\DotenvEditor\Facades\DotenvEditor;

class App
{
    public function setup()
    {
        $this->generateAppKey();
        $this->setEnvVariables();
    }

    private function generateAppKey()
    {
        Artisan::call('key:generate');
    }

    private function setEnvVariables()
    {
        $env = DotenvEditor::load();

        $env->setKey('APP_ENV', 'production');
        $env->setKey('APP_DEBUG', 'false');
        $env->setKey('APP_CACHE', 'true');
        $env->setKey('APP_URL', url('/'));

        $env->save();
    }
}
