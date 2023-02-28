<?php

namespace App\Models;

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

    public function getUser()
    {
        return $this->attributes['user'];
    }

    public function setUser($user)
    {
        $this->attributes['user'] = $user;
    }

    public function getTotal()
    {
        return $this->attributes['total'];
    }

    public function setTotal($total)
    {
        $this->attributes['total'] = $total;
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
