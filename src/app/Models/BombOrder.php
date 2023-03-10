<?php

namespace App\Models;

use App\Traits\HasClassicSetter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BombOrder extends Model
{
    use HasClassicSetter;
    use HasFactory;

    /**
     * BOMBORDER ATTRIBUTES
     * $this->attributes['id'] - int - contains the bomborder primary key (id)
     * $this->attributes['rating'] - int - contains the bomborder amount
     * $this->bomb - Bomb - contains the bomborder bomb
     * $this->order - Order - contains the bomborder order
     * $this->attributes['created_at'] - timestamp - contains the bomborder creation date
     * $this->attributes['updated_at'] - timestamp - contains the bomborder update date
     */

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