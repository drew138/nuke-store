<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;

class Order extends Model
{
    protected $table = 'orders';

    /** ORDER ATTRIBUTES
     * $this-> attributes['id'] -int - contains the product primary key (id)
     * $this->attributes['is_shipped'] - boolean -determines whether an order is shipped
     * $this->attributes['total'] -float - contains the total cost of the order
     * $this->user - BelongsTo - contains the bomb user
     * this->bombOrders - HasMany - contains the bomb bombOrders
     * $this->attributes['created_at'] - timestamp -contains the order creation date
     * $this->attributes['updated_at'] - timestamp -contains the order update date
     */

    public function getId()
    {
        return $this->attributes['id'];
    }

    public function setId($id)
    {
        $this->attributes['id'] = $id;
    }

    public function getIsShipped()
    {
        return $this->attributes['is_shipped'];
    }

    public function setIsShipped($is_shipped)
    {
        $this->attributes['is_shipped'] = $is_shipped;
    }

    public function getTotal()
    {
        return $this->attributes['total'];
    }

    public function setTotal($total)
    {
        $this->attributes['total'] = $total;
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public function setUser(User $user): void
    {
        $this->user = $user;
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

    public function getCreatedAt()
    {
        return $this->attributes['created_at'];
    }

    public function setCreatedAt($createdAt)
    {
        $this->attributes['created_at'] = $createdAt;
    }

    public function getUpdatedAt()
    {
        return $this->attributes['updated_at'];
    }

    public function setUpdatedAt($updatedAt)
    {
        $this->attributes['updated_at'] = $updatedAt;
    }
}
