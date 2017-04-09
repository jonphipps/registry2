<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Status
 *
 * @package App
 * @property integer $dispay_order
 * @property string $display_name
 * @property string $uri
*/
class Status extends Model
{
    use SoftDeletes;

    protected $fillable = ['dispay_order', 'display_name', 'uri'];
    
    public static function boot()
    {
        parent::boot();

        Status::observe(new \App\Observers\UserActionsObserver);
    }

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setDispayOrderAttribute($input)
    {
        $this->attributes['dispay_order'] = $input ? $input : null;
    }
    
}
