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
        \App\Auction::where('id', '>', 0)->delete();

        \Illuminate\Support\Facades\DB::unprepared(
            file_get_contents('database/seeds/sql/auctions.sql')
        );
    }
}
