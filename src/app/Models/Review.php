<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    /**
     * USER ATTRIBUTES
     * $this->attributes['id'] - int - contains the user primary key (id)
     * $this->attributes['title'] - string - contains the review title
     * $this->attributes['rating'] - int - contains the review rating (1-5)
     * $this->attributes['image'] - string - contains the review image
     * $this->attributes['description'] - string - contains the review description
     * $this->attributes['is_verified'] - boolean - contains the if the review has been verified
     * $this->attributes['created_at'] - timestamp - contains the user creation date
     * $this->attributes['updated_at'] - timestamp - contains the user update date
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

    public function setId($id): void
    {
        $this->attributes['id'] = $id;
    }

    public function getTitle(): string
    {
        return $this->attributes['title'];
    }

    public function setTitle($title): void
    {
        $this->attributes['title'] = $title;
    }

    public function getRating(): int
    {
        return $this->attributes['rating'];
    }

    public function setRating($rating): void
    {
        $this->attributes['rating'] = $rating;
    }

    public function getImage(): string
    {
        return $this->attributes['image'];
    }

    public function setImage($image): void
    {
        $this->attributes['image'] = $image;
    }

    public function getDescription(): string
    {
        return $this->attributes['description'];
    }

    public function setDescription($description): void
    {
        $this->attributes['description'] = $description;
    }

    public function getIsVerified(): string
    {
        return $this->attributes['is_verified'];
    }

    public function setIsVerified($isVerified): void
    {
        $this->attributes['is_verified'] = $isVerified;
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
