<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Import
 *
 * @package App
 * @property text $map
 * @property string $user
 * @property string $vocabulary
 * @property string $elementset
 * @property string $source_file_name
 * @property string $file_name
 * @property string $file_type
 * @property text $results
 * @property integer $total_processed_count
 * @property integer $error_count
 * @property integer $success_count
 * @property string $batch
*/
class Import extends Model
{
    use SoftDeletes;

    protected $fillable = ['map', 'source_file_name', 'file_name', 'file_type', 'results', 'total_processed_count', 'error_count', 'success_count', 'user_id', 'vocabulary_id', 'elementset_id', 'batch_id'];
    
    public static function boot()
    {
        parent::boot();

        Import::observe(new \App\Observers\UserActionsObserver);
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setUserIdAttribute($input)
    {
        $this->attributes['user_id'] = $input ? $input : null;
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setVocabularyIdAttribute($input)
    {
        $this->attributes['vocabulary_id'] = $input ? $input : null;
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setElementsetIdAttribute($input)
    {
        $this->attributes['elementset_id'] = $input ? $input : null;
    }

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setTotalProcessedCountAttribute($input)
    {
        $this->attributes['total_processed_count'] = $input ? $input : null;
    }

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setErrorCountAttribute($input)
    {
        $this->attributes['error_count'] = $input ? $input : null;
    }

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setSuccessCountAttribute($input)
    {
        $this->attributes['success_count'] = $input ? $input : null;
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setBatchIdAttribute($input)
    {
        $this->attributes['batch_id'] = $input ? $input : null;
    }
    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id')->withTrashed();
    }
    
    public function vocabulary()
    {
        return $this->belongsTo(Vocabulary::class, 'vocabulary_id')->withTrashed();
    }
    
    public function elementset()
    {
        return $this->belongsTo(Elementset::class, 'elementset_id')->withTrashed();
    }
    
    public function batch()
    {
        return $this->belongsTo(Batch::class, 'batch_id')->withTrashed();
    }
    
}
