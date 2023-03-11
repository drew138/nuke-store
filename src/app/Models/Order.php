<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'is_shipped',
        'total',
    ];
    protected $table = 'orders';

    /** ORDER ATTRIBUTES
     * $this-> attributes['id'] -int -contains the product primary key (id)
     * $this->attributes['is_shipped'] -boolean -determines whether an order is shipped
     * $this->attributes['user'] -foreign key -contains the user that the order belongs to
     * $this->attributes['total'] -float -contains the total cost of the order
     * $this->attributes['created_at'] -timestamp -contains the order creation date
     * $this->attributes['updated_at'] -timestamp -contains the order update date
     */

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function setId($id): void
    {
        $this->attributes['id'] = $id;
    }

    public function getIsShipped(): bool
    {
        return $this->attributes['is_shipped'];
    }

    public function setIsShipped($is_shipped): void
    {
        $this->attributes['is_shipped'] = $is_shipped;
    }

    public function getUser(): int
    {
        return $this->attributes['user'];
    }

    public function setUser($user): void
    {
        $this->attributes['user'] = $user;
    }

    public function getTotal(): int
    {
        return $this->attributes['total'];
    }

    public function setTotal($total): void
    {
        $this->attributes['total'] = $total;
    }

    public function getCreatedAt(): int
    {
        return $this->attributes['created_at'];
    }

    public function setCreatedAt($createdAt): void
    {
        $this->attributes['created_at'] = $createdAt;
    }

    public function getUpdatedAt(): int
    {
        return $this->attributes['updated_at'];
    }

    public function setUpdatedAt($updatedAt): void
    {
        $this->attributes['updated_at'] = $updatedAt;
    }

    public static function validateRequest(Request $request): void
    {
        $request->validate([
            "total" => ["required", "integer", "min:0"],
        ]);
    }
}
