<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Elementset
 *
 * @package App
 * @property string $name
 * @property string $label
 * @property text $description
 * @property string $uri
 * @property string $project
 * @property text $json
*/
class Elementset extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'label', 'description', 'uri', 'json', 'project_id'];
    
    public static function boot()
    {
        parent::boot();

        Elementset::observe(new \App\Observers\UserActionsObserver);
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setProjectIdAttribute($input)
    {
        $this->attributes['project_id'] = $input ? $input : null;
    }
    
    public function members()
    {
        return $this->belongsToMany(User::class, 'elementset_user')->withTrashed();
    }
    
    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id')->withTrashed();
    }
    
}
