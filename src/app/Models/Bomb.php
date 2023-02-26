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

    public function getId()
    {
        return $this->attributes['id'];
    }

    public function getName()
    {
        return $this->attributes['name'];
    }

    public function getType()
    {
        return $this->attributes['type'];
    }

    public function getPrice()
    {
        return $this->attributes['price'];
    }

    public function getLocationCountry()
    {
        return $this->attributes['location_country'];
    }

    public function getManufacturingCountry()
    {
        return $this->attributes['manufacturing_country'];
    }

    public function getStock()
    {
        return $this->attributes['stock'];
    }

    public function getImages()
    {
        return $this->attributes['images'];
    }

    public function getDestructionPower()
    {
        return $this->attributes['destruction_power'];
    }

    public function getCreatedAt()
    {
        return $this->attributes['created_at'];
    }

    public function getUpdatedAt()
    {
        return $this->attributes['updated_at'];
    }

    public function setId(int $id)
    {
        $this->attributes['id'] = $id;
    }

    public function setName(int $name)
    {
        $this->attributes['name'] = $name;
    }

    public function setType(int $type)
    {
        $this->attributes['type'] = $type;
    }

    public function setPrice(int $price)
    {
        $this->attributes['price'] = $price;
    }

    public function setLocationCountry(int $location_country)
    {
        $this->attributes['location_country'] = $location_country;
    }

    public function setManufacturingCountry(int $manufacturing_country)
    {
        $this->attributes['manufacturing_country'] = $manufacturing_country;
    }

    public function setStock(int $stock)
    {
        $this->attributes['stock'] = $stock;
    }

    public function setImages(int $images)
    {
        $this->attributes['images'] = $images;
    }

    public function setDestructionPower(int $destruction_power)
    {
        $this->attributes['destruction_power'] = $destruction_power;
    }

    public function setCreatedAt(int $created_at)
    {
        $this->attributes['created_at'] = $created_at;
    }

    public function setUpdatedAt(int $updated_at)
    {
        $this->attributes['updated_at'] = $updated_at;
    }
}
