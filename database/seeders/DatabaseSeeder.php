<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        
//         DB::statement("SET foreign_key_checks=0");
        $databaseName = DB::getDatabaseName();
        $tables = DB::select("SELECT * FROM information_schema.tables WHERE table_schema = '$databaseName'");
        foreach ($tables as $table) {
            $name = $table->TABLE_NAME;
            //if you don't want to truncate migrations
            if ($name == 'migrations') {
                continue;
            }
            DB::table($name)->truncate();
        }

        $this->call([
            PermissionSeeder::class,
            RoleSeeder::class,
            UserSeeder::class,

            CinemaSeeder::class,
            SeatSeeder::class,
            
            RatingSeeder::class,
            CategorySeeder::class,
            MovieSeeder::class,
        ]);
        // \App\Models\User::factory(10)->create();
//         DB::statement("SET foreign_key_checks=1");
        Schema::enableForeignKeyConstraints();
    }
}
