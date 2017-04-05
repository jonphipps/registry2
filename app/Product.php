<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Product
 *
 * @package App
 * @property string $name
 * @property text $description
 * @property decimal $price
 * @property string $photo1
 * @property string $photo2
 * @property string $photo3
*/
class Product extends Model
{
    protected $fillable = ['name', 'description', 'price', 'photo1', 'photo2', 'photo3'];
    
    public static function boot()
    {
        parent::boot();

        Product::observe(new \App\Observers\UserActionsObserver);
    }

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setPriceAttribute($input)
    {
        $this->attributes['price'] = $input ? $input : null;
    }
    
    public function category()
    {
        return $this->belongsToMany(ProductCategory::class, 'product_product_category');
    }
    
    public function tag()
    {
        return $this->belongsToMany(ProductTag::class, 'product_product_tag');
    }
    
}
