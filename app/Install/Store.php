<?php

namespace App\Install;

use App\Setting;

class Store
{
    public function setup($data)
    {
        return Setting::create([
            'site_name' => $data['site_name'],
            'site_description' => $data['site_description'],
            'site_url' => $data['site_url'],
            'site_email' => $data['site_email'],
            'ref_credits' => '75',
            'reg_credits' => '100',
            'surf_time' => '15',
        ]);
    }
}
