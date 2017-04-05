<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Project
 *
 * @package App
 * @property string $name
 * @property string $label
 * @property string $repo
 * @property text $description
 * @property string $uri
*/
class Project extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'label', 'repo', 'description', 'uri'];
    
    public static function boot()
    {
        parent::boot();

        Project::observe(new \App\Observers\UserActionsObserver);

        Project::observe(new \App\Observers\ProjectCrudActionObserver);
    }
    
    public function members()
    {
        return $this->belongsToMany(User::class, 'project_user')->withTrashed();
    }
    
}
