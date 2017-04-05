<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ProductTag
 *
 * @package App
 * @property string $name
*/
class ProductTag extends Model
{
    protected $fillable = ['name'];
    
    public static function boot()
    {
        parent::boot();

        ProductTag::observe(new \App\Observers\UserActionsObserver);
    }
    
}
