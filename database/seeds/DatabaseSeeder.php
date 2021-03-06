<?php

use App\Models\Club;
use App\Models\Plan;
use App\Models\Flash;
use App\Models\Image;
use App\Models\WebText;
use App\Models\ClassName;
use App\Models\GymClass;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

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

        // factory(Club::class,3)->create();
        // factory(WebText::class,3)->state('exposed')->create();
        // factory(ClassName::class,3)->state('exposed')->create();
        // factory(Image::class,2)->create();
        // factory(Plan::class,2)->create();
        // factory(Flash::class,8)->create();
        // factory(GymClass::class, 20)->create();

        Model::reguard();
    }
}
