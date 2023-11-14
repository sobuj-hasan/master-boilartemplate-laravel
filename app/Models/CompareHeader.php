<?php

namespace App\Models;

use App\Models\CompareItem;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CompareHeader extends Model
{
    use HasFactory, HasUuids;

    public $table='h_compares';

    protected $fillable = ['title'];
    
    public function compareItem()
    {
        return $this->hasMany(CompareItem::class);
    }
}
