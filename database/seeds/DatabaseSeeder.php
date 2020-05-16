<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use \Carbon\Carbon;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $initialUser =  User::where("email", 'customer1@gmail.com')->first();
        if (is_null($initialUser)) {
            DB::table('users')->insert([
                'name' => "Customer 1",
                'email' => 'customer1@gmail.com',
                'password' => Hash::make('password'),
            ]);
        }
        
        for ($i = 0; $i < 10; $i++) {
            DB::table('products')->insert([
                'name' => 'Pizza '. Str::random(5),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'image' => 'https://images.pexels.com/photos/803290/pexels-photo-803290.jpeg?auto=compress&cs=tinysrgb&dpr=3&h=750&w=1260',
                'price_in_usd' => mt_rand(1250,3250) / 100,
                'detail' => "Ex ad nisi aliqua qui ea sunt aliqua eu velit adipisicing. Voluptate minim duis Lorem cupidatat elit. Magna aliquip sunt tempor ea in consectetur nostrud occaecat sit duis aliqua est commodo. Occaecat occaecat esse nulla voluptate sit. Dolore minim in culpa culpa. Deserunt qui pariatur Lorem consectetur magna tempor tempor dolor. Exercitation commodo velit velit non tempor.",
            ]);
        }
    }
}
