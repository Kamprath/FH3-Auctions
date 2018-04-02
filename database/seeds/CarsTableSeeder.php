<?php

class CarsTableSeeder extends \Illuminate\Database\Seeder
{
    public function run()
    {
        \Illuminate\Support\Facades\DB::raw('delete from cars');
        foreach ((new Keboola\Csv\CsvFile(base_path() . '/database/seeds/csv/cars.csv')) as $row) {
            \App\Car::create([
                'year' => (int) $row[0],
                'make' => $row[1],
                'model' => $row[2],
                'price' => (float) str_replace(',', '', $row[3])
            ]);
        }
    }
}
