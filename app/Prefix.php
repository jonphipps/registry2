<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Prefix
 *
 * @package App
 * @property string $prefix
 * @property string $uri
 * @property integer $rank
*/
class Prefix extends Model
{
    use SoftDeletes;

    protected $fillable = ['prefix', 'uri', 'rank'];
    
    public static function boot()
    {
        parent::boot();

        Prefix::observe(new \App\Observers\UserActionsObserver);
    }

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setRankAttribute($input)
    {
        $this->attributes['rank'] = $input ? $input : null;
    }
    
}
