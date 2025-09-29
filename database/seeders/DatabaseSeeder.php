<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Group;
use App\Models\Contact;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create default groups
        $groups = ['Friends', 'Work', 'Clients'];
        foreach ($groups as $name) {
            Group::firstOrCreate(['name' => $name]);
        }

        // Create 20 sample contacts and attach random groups
        Contact::factory(20)->create()->each(function ($contact) {
            $groupIds = Group::inRandomOrder()->take(rand(1, 3))->pluck('id');
            $contact->groups()->sync($groupIds);
        });
    }
}
