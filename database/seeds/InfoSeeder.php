<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $infos = \DB::table('infos')->count();

        if($infos == 0)
        {
            \DB::table('infos')->insert([
                'name' => 'suraj',
                'email' => 'suraj.paul.69@gmail.com',
                'phonenumber' => 8076043823,
                'message' => 'This is demo message.'
            ]);
        }
    }
}
