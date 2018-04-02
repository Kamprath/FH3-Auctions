<?php namespace App\Contracts;

/**
 * Class Car
 * @package App\Contracts
 */
class Car
{
    /**
     * @var int
     */
    public $id;

    /**
     * @var int
     */
    public $year;

    /**
     * @var string
     */
    public $make;

    /**
     * @var string
     */
    public $model;

    /**
     * @var float
     */
    public $price;

    /**
     * @var Auction[]
     */
    public $auctions = [];
}