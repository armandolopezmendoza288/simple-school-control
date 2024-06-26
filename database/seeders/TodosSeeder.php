<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class TodosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $useradmin = User::create([
            'name' => 'admin paul',
            'email' => 'admin@gmail.com',
            'username' => 'Paul',
            'password' => Hash::make('admin'),
            'tipo' => '1',
        ]);

        $user1 = User::create([
            'name' => 'usuario Marcos',
            'email' => 'user@gmail.com',
            'username' => 'Marcos',
            'password' => Hash::make('admin'),
            'tipo' => '2',
        ]);
    }
}

