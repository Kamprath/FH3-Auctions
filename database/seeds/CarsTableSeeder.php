<?php

class CarsTableSeeder extends \Illuminate\Database\Seeder
{
    public function run()
    {
        \App\Auction::where('id', '>', 0)->delete();
        \App\Car::where('id', '>', 0)->delete();

        \Illuminate\Support\Facades\DB::unprepared(
            file_get_contents('database/seeds/sql/cars.sql')
        );
    }
}
