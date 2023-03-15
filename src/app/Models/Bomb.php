<?php

namespace App\Models;

use App\Traits\HasClassicSetter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class Bomb extends Model
{
    use HasClassicSetter;
    use HasFactory;

    /**
     * BOMB ATTRIBUTES
     * $this->attributes['id']                    - int       - contains the bomb primary key (id)
     * $this->attributes['name']                  - string    - contains the name of the bomb
     * $this->attributes['type']                  - string    - contains the type of the bomb. Ex: Hydrogen, Uranium, Plutonium, Neutron, etc.
     * $this->attributes['price']                 - float     - contains the price of the bomb in dollars ($USD)
     * $this->attributes['location_country']      - string    - contains the country where the bomb is located
     * $this->attributes['manufacturing_country'] - string    - contains the country where the bomb was created
     * $this->attributes['stock']                 - int       - contains the quantity of bombs available
     * $this->attributes['image']                - string     - contains the links of the image related to the bomb
     * $this->attributes['destruction_power']     - float    - contains the megatons (Mt) of the bomb
     * $this->bombOrders - Collection - contains the bomb bombOrders
     * $this->bombUsers - Collection - contains the bomb bombUsers
     * $this->reviews - Collection - contains the bomb reviews
     * $this->attributes['created_at'] - timestamp - contains the bomb creation date
     * $this->attributes['updated_at'] - timestamp - contains the bomb update date
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

    public function setName(string $name): void
    {
        $this->attributes['name'] = $name;
    }

    public function getType(): string
    {
        return $this->attributes['type'];
    }

    public function setType(string $type): void
    {
        $this->attributes['type'] = $type;
    }

    public function getPrice(): float
    {
        return $this->attributes['price'];
    }

    public function setPrice(float $price): void
    {
        $this->attributes['price'] = $price;
    }

    public function getLocationCountry(): string
    {
        return $this->attributes['location_country'];
    }

    public function setLocationCountry(string $location_country): void
    {
        $this->attributes['location_country'] = $location_country;
    }

    public function getManufacturingCountry(): string
    {
        return $this->attributes['manufacturing_country'];
    }

    public function setManufacturingCountry(string $manufacturing_country): void
    {
        $this->attributes['manufacturing_country'] = $manufacturing_country;
    }

    public function getStock(): int
    {
        return $this->attributes['stock'];
    }

    public function setStock(int $stock): void
    {
        $this->attributes['stock'] = $stock;
    }

    public function getImage(): string
    {
        return $this->attributes['image'];
    }

    public function setImages(string $image): void
    {
        $this->attributes['image'] = $image;
    }

    public function getDestructionPower(): float
    {
        return $this->attributes['destruction_power'];
    }

    public function setDestructionPower(float $destruction_power): void
    {
        $this->attributes['destruction_power'] = $destruction_power;
    }

    public function bombOrders(): HasMany
    {
        return $this->hasMany(BombOrder::class);
    }

    public function getBombOrders(): Collection
    {
        return $this->bombOrders;
    }

    public function setBombOrders(Collection $bombOrders): void
    {
        $this->bombOrders = $bombOrders;
    }

    public function bombUsers(): HasMany
    {
        return $this->hasMany(BombUser::class);
    }

    public function getBombUsers(): Collection
    {
        return $this->bombUsers;
    }

    public function setBombUsers(Collection $bombUsers): void
    {
        $this->bombUsers = $bombUsers;
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }

    public function getReviews(): Collection
    {
        return $this->reviews;
    }

    public function setReviews(Collection $reviews): void
    {
        $this->reviews = $reviews;
    }


    public function getCreatedAt(): int
    {
        return $this->attributes['created_at'];
    }

    public function getUpdatedAt(): int
    {
        return $this->attributes['updated_at'];
    }

    public static function validate(Request $request): void
    {
        $request->validate([
            'name' => 'required|string',
            'type' => 'required|string',
            'price' => 'required|gt:0',
            'location_country' => 'required|string',
            'manufacturing_country' => 'required|string',
            'stock' => 'required|gte:0',
            'image' => 'required|image',
            'destruction_power' => 'required|gte:0',
        ]);
    }

    public static function searchByName(string $name)
    {
        if ($name == '') {
            return Bomb::all();
        }
        return Bomb::where('name', 'LIKE', '%' . $name . '%')->get();
    }
}
