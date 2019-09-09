<?php

use App\Models\WebText;
use App\Models\Image;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\Amenity;
use App\Models\Plan;

class DatabaseSeeder extends Seeder
{
    use TruncateTable;

    /**
     * Seed the application's database.
     */
    public function run()
    {
        Model::unguard();

        $this->truncateMultiple([
            'cache',
            'jobs',
            'sessions',
        ]);

        $this->call(AuthTableSeeder::class);

        factory(WebText::class,3)->state('exposed')->create();
        factory(Image::class,2)->create();
        factory(Amenity::class,2)->create();
        factory(Plan::class,2)->create();

        Model::reguard();
    }
}
