<?php

namespace App\Models;

use App\Traits\HasClassicSetter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BombOrder extends Model
{
    use HasClassicSetter;

    /**
     * BOMBORDER ATTRIBUTES
     * $this->attributes['id'] - int - contains the bombOrder primary key (id)
     * $this->attributes['amount'] - int - contains the bombOrder amount
     * $this->attributes['bomb_id'] - int - contains the referenced bomb id
     * $this->attributes['order_id'] - int - contains the referenced order id
     * $this->bomb - Bomb - contains the bombOrder bomb
     * $this->order - Order - contains the bombOrder order
     * $this->attributes['created_at'] - timestamp - contains the bombOrder creation date
     * $this->attributes['updated_at'] - timestamp - contains the bombOrder update date
     */

    protected $fillable = [
        'amount',
        'bomb_id',
        'order_id',
    ];

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function getAmount(): int
    {
        return $this->attributes['amount'];
    }

    public function setAmount(int $amount): void
    {
        $this->attributes['amount'] = $amount;
    }


    public function getBombId(): int
    {
        return $this->attributes['bomb_id'];
    }

    public function setBombId(int $bombId): void
    {
        $this->attributes['bomb_id'] = $bombId;
    }

    public function getOrderId(): int
    {
        return $this->attributes['order_id'];
    }

    public function setOrderId(int $orderId): void
    {
        $this->attributes['order_id'] = $orderId;
    }

    public function bomb(): BelongsTo
    {
        return $this->belongsTo(Bomb::class);
    }

    public function getBomb(): Bomb
    {
        return $this->bomb;
    }

    public function setBomb(Bomb $bomb): void
    {
        $this->bomb = $bomb;
    }

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public function getOrder(): Order
    {
        return $this->order;
    }

    public function setOrder(Order $order): void
    {
        $this->order = $order;
    }

    public function getCreatedAt(): int
    {
        return $this->attributes['created_at'];
    }

    public function getUpdatedAt(): int
    {
        return $this->attributes['updated_at'];
    }
}