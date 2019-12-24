<?php

use Illuminate\Database\Seeder;

use App\General;

class GeneralSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        General::create([
            'business_title' => 'Laravel App'
        ]);
    }
}
