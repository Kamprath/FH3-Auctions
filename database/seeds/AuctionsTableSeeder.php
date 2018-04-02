<?php

use Illuminate\Database\Seeder;

class AuctionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::raw('delete from cars');
        foreach ((new Keboola\Csv\CsvFile(base_path() . '/database/seeds/csv/auctions.csv')) as $row) {
            \App\Auction::create([
                'car_id' => (int) $row[0],
                'buy_price' => (float) str_replace(',', '', $row[1]),
                'sell_price' => (float) str_replace(',', '', $row[2])
            ]);
        }
    }
}
