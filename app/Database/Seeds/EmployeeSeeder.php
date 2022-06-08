<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;
use App\Models\EmployeeModel;

class EmployeeSeeder extends Seeder
{
    public function run()
    {
        $employee = new EmployeeModel;
        $faker = \Faker\Factory::create('id_ID');

        for ($i = 0; $i < 20; $i++) {
            $employee->save([
                'nama_lengkap' => $faker->name,
                'tempat_lahir' => $faker->city(),
                'tgl_lahir' => $faker->dateTimeBetween('-40 years', '-18 years', null)->format('Y-m-d'),
                'jabatan' => 'Staf IT',
                'created_at'  => Time::createFromTimestamp($faker->unixTime()),
                'updated_at'  => Time::now()
            ]);
        }
    }
}
