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
 * @property enum $type
*/
class Profile extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'label', 'type'];
    
    public static function boot()
    {
        parent::boot();

        Profile::observe(new \App\Observers\UserActionsObserver);
    }

    public static $enum_type = ["Element Set" => "Element Set", "Vocabulary" => "Vocabulary"];
    
}
