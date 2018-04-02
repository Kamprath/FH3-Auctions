<?php namespace App\Contracts;

/**
 * Class Auction
 * @package App\Contracts
 */
class Auction
{
    /**
     * @var int
     */
    public $id;

    /**
     * @var int
     */
    public $car_id;

    /**
     * @var float
     */
    public $buy_price = 0.00;

    /**
     * @var float
     */
    public $sell_price = 0.00;

    /**
     * @var \DateTime
     */
    public $created_at;
}