<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Concept
 *
 * @package App
 * @property string $name
 * @property string $label
 * @property string $uri
 * @property text $description
*/
class Concept extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'label', 'uri', 'description'];
    
    public static function boot()
    {
        parent::boot();

        Concept::observe(new \App\Observers\UserActionsObserver);
    }
    
}
