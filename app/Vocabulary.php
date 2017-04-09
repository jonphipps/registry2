<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Vocabulary
 *
 * @package App
 * @property string $name
 * @property string $label
 * @property text $description
 * @property string $uri
 * @property string $project
 * @property text $json
*/
class Vocabulary extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'label', 'description', 'uri', 'json', 'project_id'];
    
    public static function boot()
    {
        parent::boot();

        Vocabulary::observe(new \App\Observers\UserActionsObserver);
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
        return $this->belongsToMany(User::class, 'user_vocabulary')->withTrashed();
    }
    
    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id')->withTrashed();
    }
    
}
