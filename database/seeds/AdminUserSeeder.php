<?php

use Illuminate\Database\Seeder;

use App\Admin;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'first_name' => 'Yasir',
            'last_name' => 'Naeem',
            'email' => 'yasir.sherwani@gmail.com',
            'designation' => 'Super Admin',
            'password' => bcrypt('123456'),
        ]);
    }
}
