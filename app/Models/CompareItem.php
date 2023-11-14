<?php

namespace App\Models;

use App\Models\CompareHeader;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CompareItem extends Model
{
    use HasFactory, HasUuids;
    
    public $table='h_compare_items';

    protected $fillable = ['title', 'description', 'image'];

    public function compareHeader()
    {
        return $this->belongsTo(CompareHeader::class);
    }
}
