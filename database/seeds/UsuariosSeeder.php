<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker::create('App\User');

    for($i=0;$i<20;$i++) {
        DB::table('users')->insert([

            'name' => $faker->name,
            'email' => $faker->email,
            'password' => Hash::make($faker->password),
            'role_id' => rand(1,2),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),


        ]);
    }
    }
}
