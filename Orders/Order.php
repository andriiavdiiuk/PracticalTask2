<?php declare(strict_types=1);
require_once "Item.php";
class Order
{
    private int $order_id;
    private Item $item;
    private DateTime $date;

    public function getOrderId(): int
    {
        return $this->order_id;
    }

    public function getItem(): Item
    {
        return $this->item;
    }

    public function setItem(Item $item): void
    {
        $this->item = $item;
    }

    public function getDate(): DateTime
    {
        return $this->date;
    }

    public function setDate(DateTime $date): void
    {
        $this->date = $date;
    }

    public function __construct(int $order_id, Item $item, DateTime $date)
    {
        $this->order_id = $order_id;
        $this->item = $item;
        $this->date = $date;
    }
}