<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Idea;
use App\Models\Status;
use App\Models\User;
use App\Models\Vote;
use App\Models\Location;
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
        User::factory()->create([
            'name' => 'Andre',
            'email' => 'andre_madarang@hotmail.com',
        ]);

        User::factory(19)->create();

        Category::factory()->create(['name' => 'House']);
        Category::factory()->create(['name' => 'Apartment']);
        Category::factory()->create(['name' => 'Studio']);
        Category::factory()->create(['name' => 'Share']);

        Status::factory()->create(['name' => 'For Sale', 'classes' => 'bg-gray-200']);
        Status::factory()->create(['name' => 'For Rent', 'classes' => 'bg-purple text-white']);
        Status::factory()->create(['name' => 'Short term Only', 'classes' => 'bg-yellow text-white']);
        Status::factory()->create(['name' => 'Not Available', 'classes' => 'bg-green text-white']);
        Status::factory()->create(['name' => 'Coming Soon', 'classes' => 'bg-red text-white']);

        Location::factory()->create(['name' => 'Port-louis']);
        Location::factory()->create(['name' => 'flic-en-flac']);
        Location::factory()->create(['name' => 'Quatre-borne']);
        Location::factory()->create(['name' => 'Grandbay']);

        Idea::factory(100)->create();





        // Generate unique votes. Ensure property_id and user_id are unique for each row
        foreach (range(1, 20) as $user_id) {
            foreach (range(1, 100) as $idea_id) {
                if ($idea_id % 2 === 0) {
                    Vote::factory()->create([
                        'user_id' => $user_id,
                        'idea_id' => $idea_id,
                    ]);
                }
            }
        }
    }
}

