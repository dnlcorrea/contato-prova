<?php

namespace Database\Seeders;

use App\Models\Contact;
use App\Models\Email;
use App\Models\Telephone;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(TelephoneTypeSeeder::class);

        User::factory()->create([
            'email' => 'dnlcorrea@gmail.com',
            'password' => bcrypt('12345678')
        ]);

        Contact::factory()
            ->count(10)
            ->has(Telephone::factory(3))
            ->has(Email::factory(3))
            ->create();
    }
}
