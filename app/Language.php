<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Language
 *
 * @package App
 * @property string $code
 * @property string $label
*/
class Language extends Model
{
    use SoftDeletes;

    protected $fillable = ['code', 'label'];
    
    public static function boot()
    {
        parent::boot();

        Language::observe(new \App\Observers\UserActionsObserver);
    }
    
}
