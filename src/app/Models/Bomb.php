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
     * $this->attributes['images']                - string    - contains the links of the images related to the bomb
     * $this->attributes['destruction_power']     - string    - contains the megatons (Mt) of the bomb
     * $this->attributes['created_at']            - timestamp - contains the date when the bomb was inserted into the DB
     * $this->attributes['updated_at']            - timestamp - contains the last date when the bomb was modified in the DB
     */
    protected $fillable = [
        'name',
        'type',
        'price',
        'location_country',
        'manufacturing_country',
        'stock',
        'images',
        'destruction_power',
        'created_at',
        'updated_at',
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

    public function getImages(): array
    {
        return $this->attributes['images'];
    }

    public function getDestructionPower(): float
    {
        return $this->attributes['destruction_power'];
    }

    public function getCreatedAt(): int
    {
        return $this->attributes['created_at'];
    }

    public function getUpdatedAt(): int
    {
        return $this->attributes['updated_at'];
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

    public function setImages(int $images): void
    {
        $this->attributes['images'] = $images;
    }

    public function setDestructionPower(int $destruction_power): void
    {
        $this->attributes['destruction_power'] = $destruction_power;
    }

    public function setCreatedAt(int $created_at): void
    {
        $this->attributes['created_at'] = $created_at;
    }

    public function setUpdatedAt(int $updated_at): void
    {
        $this->attributes['updated_at'] = $updated_at;
    }
}
