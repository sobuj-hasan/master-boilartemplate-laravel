<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class TrustedClient extends Model
{
    use HasFactory, HasUuids;
    protected $fillable = ['title'];

    public function trustedClientItem()
    {
        return $this->hasMany(TrustedClientItem::class);
    }
}
