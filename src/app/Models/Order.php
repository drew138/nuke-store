<?php

namespace App\Models;

use App\Traits\HasClassicSetter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class Order extends Model
{
    use HasClassicSetter;

    /** ORDER ATTRIBUTES
     * $this-> attributes['id'] -int - contains the order primary key (id)
     * $this->attributes['is_shipped'] - boolean -determines whether an order is shipped
     * $this->attributes['total'] - float -contains the total cost of the order
     * $this->attributes['user_id'] - int - contains the referenced user id
     * $this->user - User - contains the order user
     * $this->bombOrders - Collection - contains the order bombOrders
     * $this->attributes['created_at'] -timestamp -contains the order creation date
     * $this->attributes['updated_at'] -timestamp -contains the order update date
     */
    protected $fillable = [
        'is_shipped',
        'total',
        'user_id',
    ];

    protected $table = 'orders';

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function getIsShipped(): bool
    {
        return $this->attributes['is_shipped'];
    }

    public function setIsShipped(bool $is_shipped): void
    {
        $this->attributes['is_shipped'] = $is_shipped;
    }

    public function getTotal(): int
    {
        return $this->attributes['total'];
    }

    public function setTotal(int $total): void
    {
        $this->attributes['total'] = $total;
    }

    public function getUserId(): int
    {
        return $this->attributes['user_id'];
    }

    public function setUserId(int $userId): void
    {
        $this->attributes['user_id'] = $userId;
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

    public function getCreatedAt(): int
    {
        return $this->attributes['created_at'];
    }

    public function getUpdatedAt(): int
    {
        return $this->attributes['updated_at'];
    }

    public static function validateRequest(Request $request): void
    {
        $request->validate([
            'total' => ['required', 'integer', 'min:0'],
        ]);
    }
}
