<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Re
 *
 * @package App
 * @property string $name
 * @property string $label
 * @property text $description
 * @property string $uri
 * @property string $project
 * @property string $profile
 * @property text $json
*/
class Re extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'label', 'description', 'uri', 'json', 'project_id', 'profile_id'];
    
    public static function boot()
    {
        parent::boot();

        Re::observe(new \App\Observers\UserActionsObserver);
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setProjectIdAttribute($input)
    {
        $this->attributes['project_id'] = $input ? $input : null;
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setProfileIdAttribute($input)
    {
        $this->attributes['profile_id'] = $input ? $input : null;
    }
    
    public function members()
    {
        return $this->belongsToMany(User::class, 're_user')->withTrashed();
    }
    
    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id')->withTrashed();
    }
    
    public function profile()
    {
        return $this->belongsTo(Profile::class, 'profile_id')->withTrashed();
    }
    
}
