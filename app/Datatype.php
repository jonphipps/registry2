<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Datatype
 *
 * @package App
 * @property string $name
 * @property string $label
 * @property text $description
*/
class Datatype extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'label', 'description'];
    
    public static function boot()
    {
        parent::boot();

        Datatype::observe(new \App\Observers\UserActionsObserver);
    }
    
}
