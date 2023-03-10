<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BombUser extends Model
{
    use HasClassicSetter;
    use HasFactory;

    /**
     * BOMBORDER ATTRIBUTES
     * $this->attributes['id'] - int - contains the bomborder primary key (id)
     * $this->attributes['rating'] - int - contains the bomborder amount
     * $this->user - int - contains the bomborder user
     * $this->bomb - int - contains the bomborder bomb
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

    public function getCreatedAt(): int
    {
        return $this->attributes['created_at'];
    }

    public function getUpdatedAt(): int
    {
        return $this->attributes['updated_at'];
    }
}