<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $user = User::firstOrCreate([
            'first_name' => 'Demo',
            'last_name' => 'Admin',
            'user_name' => 'admin',
            'phone' => '0788989898',
            'email' => 'admin@admin.com',
            'position' => 'Lead',
            'password' => 'admin',
        ]);
    }
}
