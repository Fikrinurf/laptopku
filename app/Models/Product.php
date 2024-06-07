<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['product_name', 'desc', 'price', 'specification', 'processor_id', 'brand_id', 'warranty', 'img', 'upload_date'];

    public function Processor(): BelongsTo
    {
        return $this->belongsTo(Processors::class);
    }

    public function Brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }
}
