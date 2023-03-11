<?php

namespace App\Models;

use App\Traits\HasClassicSetter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Review extends Model
{
    use HasClassicSetter;
    use HasFactory;

    /**
     * Review ATTRIBUTES
     * $this->attributes['id'] - int - contains the review primary key (id)
     * $this->attributes['title'] - string - contains the review title
     * $this->attributes['rating'] - int - contains the review rating (1-5)
     * $this->attributes['image'] - string - contains the review image
     * $this->attributes['description'] - string - contains the review description
     * $this->attributes['is_verified'] - boolean - contains the if the review has been verified
     * $this->attributes['created_at'] - timestamp - contains the review creation date
     * $this->attributes['updated_at'] - timestamp - contains the review update date
     */
    protected $fillable = [
        'title',
        'rating',
        'image',
        'description',
        'is_verified',
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

    public function getIsVerified(): string
    {
        return $this->attributes['is_verified'];
    }

    public function setIsVerified(bool $isVerified): void
    {
        $this->attributes['is_verified'] = $isVerified;
    }

    public function getCreatedAt(): int
    {
        return $this->attributes['created_at'];
    }

    public function getUpdatedAt(): int
    {
        return $this->attributes['updated_at'];
    }

    public static function validateRequest(Request $request): void {
        $request->validate([
            'title' => 'required',
            'rating' => 'required|gte:1|lte:5',
            'image' => 'required',
            'description' => 'required',
            'is_verified' => 'required|boolean',
        ]);
    }
}
