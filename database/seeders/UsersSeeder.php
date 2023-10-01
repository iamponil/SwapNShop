<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i =0; $i<=10 ;$i++){
            \Illuminate\Support\Facades\DB::table('users')->insert([
                'name' => "test" . \Illuminate\Support\Str::random(10),

                'email' =>"test". \Illuminate\Support\Str::random(10).'@gmail.com',
                'password' => \Illuminate\Support\Facades\Hash::make('password'),
                        ]);
                    }
                }
            }
