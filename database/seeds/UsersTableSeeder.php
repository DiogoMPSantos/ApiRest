<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert(
            [
                [   
                    'name'=>'Diogo', 
                    'email'=>'diogosantos.@gmail.com', 
                    'password' => bcrypt('12345'), 
                    'isAdmin'=>0 
                ],
                [   
                    'name'=>'Tereza', 
                    'email'=>'terezalenira@gmail.com', 
                    'password' => bcrypt('54321'),
                    'isAdmin'=>0 
                ],
                [
                    'name'=>'Diego', 
                    'email'=>'diegosantos@gmail.com', 
                    'password' => bcrypt('67890'), 
                    'isAdmin'=>0 
                ],
                [
                    'name'=>'Nara', 
                    'email'=>'narasantos@gmail.com', 
                    'password' => bcrypt('09876'), 
                    'isAdmin'=>0 
                ],
                [
                    'name'=>'Diandra', 
                    'email'=>'diandrasantos@gmail.com', 
                    'password' => bcrypt('00000'), 
                    'isAdmin'=>0 
                ],
                [
                    'name'=>'Manoel', 
                    'email'=>'manoelsantos@gmail.com', 
                    'password' => bcrypt('11111'), 
                    'isAdmin'=>0 
                ],
                [
                    'name'=>'Admin', 
                    'email'=>'test@nextem.com.br', 
                    'password' => bcrypt('1234'), 
                    'isAdmin'=>1
                ]
            ]
        );
    }
}
