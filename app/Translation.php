<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Translation
 *
 * @package App
 * @property string $res
*/
class Translation extends Model
{
    use SoftDeletes;

    protected $fillable = ['res_id'];
    
    public static function boot()
    {
        parent::boot();

        Translation::observe(new \App\Observers\UserActionsObserver);
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setResIdAttribute($input)
    {
        $this->attributes['res_id'] = $input ? $input : null;
    }
    
    public function res()
    {
        return $this->belongsTo(Re::class, 'res_id')->withTrashed();
    }
    
}
