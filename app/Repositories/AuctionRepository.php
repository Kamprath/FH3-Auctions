<?php namespace App\Repositories;

use App\Contracts\Auction;
use App\Contracts\Car;

class AuctionRepository extends Repository
{
    /**
     * @return Auction[]
     */
    public function all(): array
    {
        return \App\Auction::with('car')
            ->get()
            ->map(function(\App\Auction $auction) {
                return $this->modelToContract($auction, new Auction());
            })->toArray();
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data)
    {
        // TODO: Implement create() method.
    }

    /**
     * @param array $data
     * @param int $id
     * @return mixed
     */
    public function update(array $data, int $id)
    {
        // TODO: Implement update() method.
    }

    /**
     * @param int $id
     * @return bool
     */
    public function delete(int $id)
    {
        // TODO: Implement delete() method.
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function find(int $id)
    {
        // TODO: Implement find() method.
    }

    protected function modelToContract(\App\Auction $model, Auction $contract): Auction
    {
        $contract->id = $model->id;
        $contract->car_id = $model->car_id;
        $contract->buy_price = $model->buy_price;
        $contract->sell_price = $model->sell_price;
        $contract->created_at = new \DateTime($model->created_at);

        if (!empty($model->car)) {
            $contract->car = new Car();
            $contract->car->id = $model->car->id;
            $contract->car->make = $model->car->make;
            $contract->car->model = $model->car->model;
            $contract->car->year = $model->car->year;
            $contract->car->price = $model->car->price;
        }

        return $contract;
    }
}