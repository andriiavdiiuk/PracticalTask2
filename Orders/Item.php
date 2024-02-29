<?php declare(strict_types=1);

class Item
{
    public int $item_id;
    public string $name;
    public int $price;


    public function getItemId(): int
    {
        return $this->item_id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getPrice(): int
    {
        return $this->price;
    }

    public function setPrice(int $price): void
    {
        $this->price = $price;
    }

    public function __construct(int $item_id, string $name, int $price)
    {
        $this->item_id = $item_id;
        $this->name = $name;
        $this->price = $price;
    }

}