<?php

use Illuminate\Database\Seeder;

class ClearDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\Schema::disableForeignKeyConstraints();

        \Illuminate\Support\Facades\DB::table('products')->truncate();
        \Illuminate\Support\Facades\DB::table('posts')->truncate();

        \Illuminate\Support\Facades\Schema::enableForeignKeyConstraints();

    }
}
