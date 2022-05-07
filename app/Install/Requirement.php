<?php

namespace App\Install;

class Requirement
{
    public function checkSystemCompatibility()
    {
        return [
            [
                'type' => 'extension',
                'name' => 'PHP version',
                'check' => version_compare(phpversion(), '7.1.3', '>='),
            ],
            [
                'type' => 'extension',
                'name' => 'OpenSSL Extension',
                'check' => extension_loaded('openssl'),
            ],
            [
                'type' => 'extension',
                'name' => 'Mbstring PHP Extension',
                'check' => extension_loaded('mbstring'),
            ],
            [
                'type' => 'extension',
                'name' => 'PDO PHP extension',
                'check' => extension_loaded('pdo'),
            ],
            [
                'type' => 'extension',
                'name' => 'PHP GD Library',
                'check' => (extension_loaded('gd') && function_exists('gd_info')),
            ],
            [
                'type' => 'extension',
                'name' => 'PHP CURL extension',
                'check' => extension_loaded('curl'),
            ],
            [
                'type' => 'extension',
                'name' => 'PHP XML extension',
                'check' => extension_loaded('xml'),
            ],

            [
                'type' => 'directory',
                'name' => base_path('storage/app'),
                'check' => is_writable(base_path('/storage/app')),
            ],
            [
                'type' => 'directory',
                'name' => base_path('bootstrap/cache'),
                'check' => is_writable(base_path('/bootstrap/cache')),
            ],
        ];
    }
    public function satisfied()
    {
        $compatibilities = $this->checkSystemCompatibility();
        foreach ($compatibilities as $compatibility) {
            if (!$compatibility['check']) {
                return false;
            }
        }
        return true;
    }
}
