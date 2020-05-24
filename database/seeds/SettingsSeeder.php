<?php

use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        \App\Settings::firstOrCreate([
            'retail' => 20000,
            'wholesale' => 50000,
            'penalty' => 10000,
        ]);
    }
}
