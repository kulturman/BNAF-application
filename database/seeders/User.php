<?php

namespace Database\Seeders;

use App\Models\User as UserModel;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class User extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserModel::create([
            'name' => 'Arnaud',
            'email' => 'admin@bnaf.com',
            'password' => Hash::make('12345678'),
            'phone' => '61437073',
            'email_verified_at' => Carbon::now()
        ]);
    }
}
