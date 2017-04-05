<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ProductCategory
 *
 * @package App
 * @property string $name
 * @property text $description
 * @property string $photo
*/
class ProductCategory extends Model
{
    protected $fillable = ['name', 'description', 'photo'];
    
    public static function boot()
    {
        parent::boot();

        ProductCategory::observe(new \App\Observers\UserActionsObserver);
    }
    
}
