<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Request;
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
     * $this->attributes['country'] - string - contains the user country
     * $this->attributes['balance'] - float - contains the user balance
     * $this->attributes['profile_picture'] - string - cotains the profile picture
     * this->bombUsers - HasMany - contains the user bombUsers
     * this->orders - HasMany - contains the user orders
     * this->reviews - HasMany - contains the user reviews
     * $this->attributes['created_at'] - timestamp - contains the user creation date
     * $this->attributes['updated_at'] - timestamp - contains the user update date
     */
    protected $fillable = [
        'name',
        'email',
        'role',
        'password',
        'balance',
        'country',
    ];

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

    public static function validate(Request $request): void
    {
        $request->validate([
            'name' => 'required|string',
            'role' => 'required|string',
            'balance' => 'required|gte:0',
            'country' => 'required|string',
        ]);
    }

    public static function validateAndPassword(Request $request): void
    {
        $request->validate([
            'password' => 'required|string|min:8',
            'email' => 'required|email',
        ]);
    }

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

    public function getProfilePicture(): string
    {
        return $this->attributes['profile_picture'];
    }

    public function setProfilePicture(string $profilePicture): void
    {
        $this->attributes['profile_picture'] = $profilePicture;
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

    public function getBalance(): float
    {
        return $this->attributes['balance'];
    }

    public function setBalance(float $balance): void
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

    public function getCreatedAt()
    {
        return $this->attributes['created_at'];
    }

    public function getUpdatedAt()
    {
        return $this->attributes['updated_at'];
    }

    public function getTotalMegatons(): int
    {
        $total = 0;
        foreach ($this->bombUsers as $bombUser) {
            $total += $bombUser->getAmount() * $bombUser->getBomb()->getDestructionPower();
        }

        return $total;
    }

    public static function getTotalMegatonsByCountry(): array
    {
        $data = [];
        $users = User::with('bombUsers.bomb')->get();
        foreach ($users as $user) {
            $country = $user->getCountry();
            if (array_key_exists($country, $data)) {
                $data[$country] += $user->getTotalMegatons();
            } else {
                $data[$country] = $user->getTotalMegatons();
            }
        }

        return $data;
    }
}
