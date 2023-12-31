<?php

namespace App\Models;

use App\Enums\BookTypeEnum;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'cover', 'type'
    ];

    protected function type(): Attribute
    {
        return Attribute::make(
            get: fn (int $value) => match($value) {
                BookTypeEnum::AUDIOBOOK->value => BookTypeEnum::AUDIOBOOK->name,
                BookTypeEnum::TEXTBOOK->value => BookTypeEnum::TEXTBOOK->name,
            }
        );
    }
}
