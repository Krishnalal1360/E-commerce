<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductColor;
use App\Models\ProductImage;

/**
 * @property string $name
 * @property float $price
 * @property string $tag
 * @property int $quantity
 * @property string $sku
 * @property string|null $description
 * @property string|null $image
 */
class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'tag',
        'quantity',
        'sku',
        'description'
    ];

    public $timestamps = true;

    public function colors(){
        return $this->hasMany(ProductColor::class);
    }

    public function images(){
        return $this->hasMany(ProductImage::class);
    }
}
