<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Profile
 *
 * @package App
 * @property string $name
 * @property string $label
*/
class Profile extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'label'];
    
    public static function boot()
    {
        parent::boot();

        Profile::observe(new \App\Observers\UserActionsObserver);
    }
    
}
