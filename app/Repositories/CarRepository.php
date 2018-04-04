<?php namespace App\Repositories;

use App\Auction;
use App\Car;
use App\Contracts\Car as CarContract;
use DateTime;

class CarRepository extends Repository implements CarRepositoryInterface
{
    /**
     * @param bool $withAuctions
     * @return CarContract[]
     */
    public function all(bool $withAuctions = false): array
    {
        return Car::with($withAuctions ? ['auctions'] : [])
            ->orderBy('make')
            ->orderBy('model')
            ->get()
            ->map(function(Car $car) {
                return $this->modelToContract($car, new CarContract());
            })
            ->toArray();
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data): CarContract
    {
        return Car::create($data);
    }

    /**
     * @param array $data
     * @param int $id
     * @return mixed
     */
    public function update(array $data, int $id): CarContract
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
    public function find(int $id): CarContract
    {
        return $this->modelToContract(
            Car::findOrFail($id),
            new CarContract()
        );
    }

    /**
     * @param Car $car
     * @param CarContract $contract
     * @return CarContract
     */
    protected function modelToContract(Car $car, CarContract $contract): CarContract
    {
        $contract->id = $car->id;
        $contract->year = $car->year;
        $contract->make = $car->make;
        $contract->model = $car->model;
        $contract->price = $car->price;

        $contract->auctions = $car->auctions->map(function(Auction $auction) {
            $auctionContract = new \App\Contracts\Auction();

            $auctionContract->id = (int) $auction->id;
            $auctionContract->car_id = (int) $auction->car_id;
            $auctionContract->buy_price = (float) $auction->buy_price;
            $auctionContract->sell_price = (float) $auction->sell_price;
            $auctionContract->created_at = new DateTime($auction->created_at);

            return $auctionContract;
        });

        return $contract;
    }
}