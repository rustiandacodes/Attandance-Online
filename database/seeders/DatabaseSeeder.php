<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Master_shift;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {

        User::factory()->create([
            'name' => 'Adzeni Rustianda',
            'email' => 'rustiandazen09@gmail.com',
            'password' => bcrypt('password')
        ]);

        User::factory(10)->create();

        $users = User::all();

        foreach($users as $user) {

            $x = 1;

            while($x <= 30) {
                $date = $x . "/09/2022" ;
                $lenght = strlen($date);

                if ($lenght < 10) {
                    $date = "0" . $x . "/09/2022";
                    
                    Master_shift::create([
                        'user_id' => $user->id,
                        'name' => $user->name,
                        'date' =>  $date,
                    ]);

                } else {
                    Master_shift::create([
                        'user_id' => $user->id,
                        'name' => $user->name,
                        'date' =>  $date,
                    ]);
                }

                $x++;
            }

        }

        


    }
}
