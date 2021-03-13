<?php


namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'Usuario Prueba',
                'email' => 'prueba@prueba.com',
                'password' => Hash::make('prueba123*'),
            ]
        ];

        foreach ($users as $userCollections) {
            $user = new User;
            foreach ($userCollections as $key => $collection) {
                $user->{$key} = $collection;
            }
            $user->save();
        }
    }
}
