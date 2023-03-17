<?php

namespace App\Models;

use App\Traits\HasClassicSetter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BombUser extends Model
{
    use HasClassicSetter;

    /**
     * BOMBORDER ATTRIBUTES
     * $this->attributes['id'] - int - contains the bombUser primary key (id)
     * $this->attributes['amount'] - int - contains the bombUser amount
     * $this->attributes['bomb_id'] - int - contains the referenced bomb id
     * $this->attributes['user_id'] - int - contains the referenced user id
     * $this->bomb - Bomb - contains the bombUser bomb
     * $this->user - User - contains the bombUser user
     * $this->attributes['created_at'] - timestamp - contains the bombuUser creation date
     * $this->attributes['updated_at'] - timestamp - contains the bombUser update date
     */
    protected $fillable = [
        'amount',
        'bomb_id',
        'user_id',
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

    public function getUserId(): int
    {
        return $this->attributes['user_id'];
    }

    public function setUserId(int $userId): void
    {
        $this->attributes['user_id'] = $userId;
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
