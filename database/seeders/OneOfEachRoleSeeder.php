<?php

namespace Database\Seeders;

use App\Enums\UserRole;
use App\Enums\UserTitle;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class OneOfEachRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $oneOfEachRole = array(
            $Admin = new User(),
            $Patient = new User(),
            $Nurse = new User(),
            $Doctor = new User(),
        );

        $Admin->role = UserRole::ADMIN;
        $Admin->title = UserTitle::ADMIN;
        $Admin->username = "__Admin";
        $Admin->email = "admin@szczepimy.sie";
        $Admin->password = "test123";

        $Patient->role = UserRole::PATIENT;
        $Patient->title = UserTitle::PATIENT;
        $Patient->username = "__Patient";
        $Patient->email = "pacjent@szczepimy.sie";
        $Patient->password = "test123";

        $Nurse->role = UserRole::NURSE;
        $Nurse->title = UserTitle::NURSE;
        $Nurse->username = "__Nurse";
        $Nurse->email = "siostra@szczepimy.sie";
        $Nurse->password = "test123";

        $Doctor->role = UserRole::DOCTOR;
        $Doctor->title = UserTitle::DOCTOR;
        $Doctor->username = "__Doctor";
        $Doctor->email = "lekarz@szczepimy.sie";
        $Doctor->password = "test123";

        foreach ($oneOfEachRole as $eachOne) {
           DB::table('users')->insert([
               'username'=>$eachOne->username,
               'email'=>$eachOne->email,
               'password'=>Hash::make($eachOne->password),
               'role'=>$eachOne->role,
               'title'=>$eachOne->title
           ]);
        }

    }
}
