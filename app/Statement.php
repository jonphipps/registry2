<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Statement
 *
 * @package App
 * @property text $value
 * @property string $translation
 * @property string $res
*/
class Statement extends Model
{
    use SoftDeletes;

    protected $fillable = ['value', 'translation_id', 'res_id'];
    
    public static function boot()
    {
        parent::boot();

        Statement::observe(new \App\Observers\UserActionsObserver);
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setTranslationIdAttribute($input)
    {
        $this->attributes['translation_id'] = $input ? $input : null;
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setResIdAttribute($input)
    {
        $this->attributes['res_id'] = $input ? $input : null;
    }
    
    public function translation()
    {
        return $this->belongsTo(Translation::class, 'translation_id')->withTrashed();
    }
    
    public function res()
    {
        return $this->belongsTo(Re::class, 'res_id')->withTrashed();
    }
    
}
