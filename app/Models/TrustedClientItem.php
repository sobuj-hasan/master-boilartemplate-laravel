<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class TrustedClientItem extends Model
{
    use HasFactory, HasUuids;
    protected $fillable = ['title','photo','trusted_client_id'];

    public function trustedClient()
    {
        return $this->belongsTo(TrustedClient::class);
    }
}
