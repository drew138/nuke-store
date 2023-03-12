<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Collection;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
    * USER ATTRIBUTES
    * $this->attributes['id'] - int - contains the user primary key (id) * $this->attributes['name'] - string - contains the user name
    * $this->attributes['email'] - string - contains the user email
    * $this->attributes['email_verified_at'] - timestamp - contains the user email verification date * $this->attributes['password'] - string - contains the user password
    * $this->attributes['remember_token'] - string - contains the user password
    * $this->attributes['role'] - string - contains the user role (client or admin)
    * $this->attributes['country'] - int - contains the user balance
    * $this->attributes['balance'] - int - contains the user balance
    * this->bombUsers - HasMany - contains the user bombUsers
    * this->orders - HasMany - contains the user orders
    * this->reviews - HasMany - contains the user reviews
    * $this->attributes['created_at'] - timestamp - contains the user creation date
    * $this->attributes['updated_at'] - timestamp - contains the user update date
    */
    protected $fillable = [
        'name',
        'email',
        'password',
        'balance',
        'country',
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

    public function getEmail(): string
    {
        return $this->attributes['email'];
    }

    public function setEmail(string $email): void
    {
        $this->attributes['email'] = $email;
    }

    public function getPassword(): string
    {
        return $this->attributes['password'];
    }

    public function setPassword(string $password): void
    {
        $this->attributes['password'] = $password;
    }

    public function getRole(): string
    {
        return $this->attributes['role'];
    }

    public function setRole(string $role): void
    {
        $this->attributes['role'] = $role;
    }

    public function getCountry(): string
    {
        return $this->attributes['country'];
    }

    public function setCountry(string $country): void
    {
        $this->attributes['country'] = $country;
    }

    public function getBalance(): int
    {
        return $this->attributes['balance'];
    }

    public function setBalance(int $balance): void
    {
        $this->attributes['balance'] = $balance;
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

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    public function getOrders(): Collection
    {
        return $this->orders;
    }

    public function setOrders(Collection $orders): void
    {
        $this->orders = $orders;
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

    public function getCreatedAt() {
        return $this->attributes['created_at'];
    }

    public function getUpdatedAt()
    {
        return $this->attributes['updated_at'];
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
