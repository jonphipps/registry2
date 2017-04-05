<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Property
 *
 * @package App
 * @property string $name
 * @property string $label
 * @property string $uri
 * @property string $profile
 * @property tinyInteger $in_list
 * @property tinyInteger $in_show
 * @property tinyInteger $in_edit
 * @property tinyInteger $in_create
 * @property tinyInteger $in_rdf
 * @property tinyInteger $in_xml
 * @property string $symmetric_uri
*/
class Property extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'label', 'uri', 'in_list', 'in_show', 'in_edit', 'in_create', 'in_rdf', 'in_xml', 'symmetric_uri', 'profile_id'];
    
    public static function boot()
    {
        parent::boot();

        Property::observe(new \App\Observers\UserActionsObserver);
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setProfileIdAttribute($input)
    {
        $this->attributes['profile_id'] = $input ? $input : null;
    }
    
    public function profile()
    {
        return $this->belongsTo(Profile::class, 'profile_id')->withTrashed();
    }
    
}
