<?php

namespace Database\Seeders;

use App\Models\TelephoneType;
use Illuminate\Database\Seeder;

class TelephoneTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TelephoneType::insert([
            ['name' => 'mobile'],
            ['name' => 'landline'],
            ['name' => 'work'],
            ['name' => 'home'],
        ]);
    }
}
