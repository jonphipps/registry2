<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Element
 *
 * @package App
 * @property string $name
 * @property string $label
 * @property string $uri
 * @property text $description
 * @property text $json
*/
class Element extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'label', 'uri', 'description', 'json'];
    
    public static function boot()
    {
        parent::boot();

        Element::observe(new \App\Observers\UserActionsObserver);
    }
    
}
