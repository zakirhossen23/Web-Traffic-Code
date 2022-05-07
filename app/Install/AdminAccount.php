<?php

namespace App\Install;

use App\User;
use Illuminate\Support\Facades\DB;

class AdminAccount
{
    public function setup($data)
    {
        $this->addAdminAccount($data);
        $this->insertDefaultWebsites();
    }

    private function addAdminAccount($data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'username' => $data['username'],
            'password' => bcrypt($data['password']),
            'credits' => '100',
            'userlevel' => '1',
        ]);
    }

    private function insertDefaultWebsites()
    {
        return DB::table('websites')->insert([
            ['user_id' => '1', 'url' => 'https://trafficexchangescript.net', 'credits' => '1.00', 'hits' => '0', 'status' => '0', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')]
        ]);
    }
}
