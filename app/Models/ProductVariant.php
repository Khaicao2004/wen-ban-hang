<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariant extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
        'price',
        'quantity',
        'image'
    ];
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function attributes()
    {
        return $this->belongsToMany(Attribute::class, 'product_variant_attribute')
            ->withPivot('attribute_value_id');
    }
    
    public function attributeValues()
    {
        return $this->belongsToMany(AttributeValue::class, 'product_variant_attribute')
            ->withPivot('attribute_id');
    }
}
