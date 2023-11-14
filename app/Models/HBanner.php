<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class HBanner extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'title',
        'description',
        'is_active',
    ];

    public function test($data){
        $words = explode(" ", $data); // Split the string into an array of words
        $wordCount = count($words);
        if ($wordCount <= 2) {
            return [
                'lastTwoWords' => implode(" ", $words),
                'restOfWords' => '',
                'allwords' => $data,
            ];
        }
        $lastTwoWords = array_slice($words, -2); // Extract the last two words
        $restOfWords = array_slice($words, 0, $wordCount - 2); // Extract the remaining words
        return [
            'lastTwoWords' => implode(" ", $lastTwoWords),
            'restOfWords' => implode(" ", $restOfWords),
            'allwords' => $data,
        ];
    }

    protected function title(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => $this->test($value),
        );
    }
}
