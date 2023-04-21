<?php

namespace App\Models;

use App\Traits\HasClassicSetter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Http\Request;

class Review extends Model
{
    use HasClassicSetter, HasFactory;

    /**
     * Review ATTRIBUTES
     * $this->attributes['id'] - int - contains the review primary key (id)
     * $this->attributes['title'] - string - contains the review title
     * $this->attributes['rating'] - int - contains the review rating (1-5)
     * $this->attributes['image'] - string - contains the review image
     * $this->attributes['description'] - string - contains the review description
     * $this->attributes['is_verified'] - boolean - contains the if the review has been verified
     * $this->attributes['bomb_id'] - int - contains the referenced bomb id
     * $this->attributes['user_id'] - int - contains the referenced user id
     * $this->bomb - Bomb - contains the bombUser bomb
     * $this->user - User - contains the bombUser user
     * $this->attributes['created_at'] - timestamp - contains the review creation date
     * $this->attributes['updated_at'] - timestamp - contains the review update date
     */
    protected $fillable = [
        'title',
        'rating',
        'image',
        'description',
        'is_verified',
        'bomb_id',
        'user_id',
    ];

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function setId(int $id): void
    {
        $this->attributes['id'] = $id;
    }

    public function getTitle(): string
    {
        return $this->attributes['title'];
    }

    public function setTitle(string $title): void
    {
        $this->attributes['title'] = $title;
    }

    public function getRating(): int
    {
        return $this->attributes['rating'];
    }

    public function setRating(int $rating): void
    {
        $this->attributes['rating'] = $rating;
    }

    public function getImage(): string
    {
        return $this->attributes['image'];
    }

    public function setImage(string $image): void
    {
        $this->attributes['image'] = $image;
    }

    public function getDescription(): string
    {
        return $this->attributes['description'];
    }

    public function setDescription(string $description): void
    {
        $this->attributes['description'] = $description;
    }

    public function getIsVerified(): bool
    {
        return $this->attributes['is_verified'];
    }

    public function setIsVerified(bool $isVerified): void
    {
        $this->attributes['is_verified'] = $isVerified;
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

    public function verify(): void
    {
        $this->setIsVerified(true);
        $this->save();
    }

    public function unverify(): void
    {
        $this->setIsVerified(false);
        $this->save();
    }
}
