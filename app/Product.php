<?php

namespace app;

use \polakjan\mvc\db;

/**
 * represents one row in the table `product`
 */
class Product
{
    // properties represent the columns of the table
    public $id = null;
    public $name = null;
    public $description = null;
    public $price = null;
    public $unit_qty = 1;
    public $amount_in_stock = 0;
    public $is_top = 0;

    public function insert()
    {
        $query = "
            INSERT
            INTO `product`
            (`name`, `description`, `price`, `unit_qty`, `amount_in_stock`, `is_top`)
            VALUES
            (?, ?, ?, ?, ?, ?)
        ";
        $values = [
            $this->name,
            $this->description,
            $this->price,
            $this->unit_qty,
            $this->amount_in_stock,
            $this->is_top
        ];

        db::query($query, $values);

        // find the last inserted id and update this object's property
        $this->id = db::getConnection()->lastInsertId();
    }
}