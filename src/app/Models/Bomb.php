<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bomb extends Model
{
    use HasFactory;

    /**
     * PRODUCT ATTRIBUTES
     * $this->attributes['id']                    - int       - contains the bomb primary key (id)
     * $this->attributes['name']                  - string    - contains the name of the bomb
     * $this->attributes['type']                  - string    - contains the type of the bomb. Ex: Hydrogen, Uranium, Plutonium, Neutron, etc.
     * $this->attributes['price']                 - float     - contains the price of the bomb in dollars ($USD)
     * $this->attributes['location_country']      - string    - contains the country where the bomb is located
     * $this->attributes['manufacturing_country'] - string    - contains the country where the bomb was created
     * $this->attributes['stock']                 - int       - contains the quantity of bombs available
     * $this->attributes['image']                - string     - contains the links of the image related to the bomb
     * $this->attributes['destruction_power']     - string    - contains the megatons (Mt) of the bomb
     */
    protected $fillable = [
        'name',
        'type',
        'price',
        'location_country',
        'manufacturing_country',
        'stock',
        'image',
        'destruction_power',
    ];

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function getName(): string
    {
        return $this->attributes['name'];
    }

    public function getType(): string
    {
        return $this->attributes['type'];
    }

    public function getPrice(): float
    {
        return $this->attributes['price'];
    }

    public function getLocationCountry(): string
    {
        return $this->attributes['location_country'];
    }

    public function getManufacturingCountry(): string
    {
        return $this->attributes['manufacturing_country'];
    }

    public function getStock(): int
    {
        return $this->attributes['stock'];
    }

    public function getImage(): string
    {
        return $this->attributes['image'];
    }

    public function getDestructionPower(): float
    {
        return $this->attributes['destruction_power'];
    }

    public function setId(int $id): void
    {
        $this->attributes['id'] = $id;
    }

    public function setName(int $name): void
    {
        $this->attributes['name'] = $name;
    }

    public function setType(int $type): void
    {
        $this->attributes['type'] = $type;
    }

    public function setPrice(int $price): void
    {
        $this->attributes['price'] = $price;
    }

    public function setLocationCountry(int $location_country): void
    {
        $this->attributes['location_country'] = $location_country;
    }

    public function setManufacturingCountry(int $manufacturing_country): void
    {
        $this->attributes['manufacturing_country'] = $manufacturing_country;
    }

    public function setStock(int $stock): void
    {
        $this->attributes['stock'] = $stock;
    }

    public function setImages(int $image): void
    {
        $this->attributes['image'] = $image;
    }

    public function setDestructionPower(int $destruction_power): void
    {
        $this->attributes['destruction_power'] = $destruction_power;
    }
}
