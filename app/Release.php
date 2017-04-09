<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Release
 *
 * @package App
 * @property string $sha
 * @property string $tag
 * @property text $notes
 * @property string $project
*/
class Release extends Model
{
    use SoftDeletes;

    protected $fillable = ['sha', 'tag', 'notes', 'project_id'];
    
    public static function boot()
    {
        parent::boot();

        Release::observe(new \App\Observers\UserActionsObserver);
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setProjectIdAttribute($input)
    {
        $this->attributes['project_id'] = $input ? $input : null;
    }
    
    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id')->withTrashed();
    }
    
}
