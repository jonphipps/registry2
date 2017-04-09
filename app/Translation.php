<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Translation
 *
 * @package App
 * @property string $version
 * @property string $elementset
 * @property string $vocabulary
 * @property string $concept
 * @property string $element
*/
class Translation extends Model
{
    use SoftDeletes;

    protected $fillable = ['version', 'elementset_id', 'vocabulary_id', 'concept_id', 'element_id'];
    
    public static function boot()
    {
        parent::boot();

        Translation::observe(new \App\Observers\UserActionsObserver);
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
    public function setConceptIdAttribute($input)
    {
        $this->attributes['concept_id'] = $input ? $input : null;
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setElementIdAttribute($input)
    {
        $this->attributes['element_id'] = $input ? $input : null;
    }
    
    public function elementset()
    {
        return $this->belongsTo(Elementset::class, 'elementset_id')->withTrashed();
    }
    
    public function vocabulary()
    {
        return $this->belongsTo(Vocabulary::class, 'vocabulary_id')->withTrashed();
    }
    
    public function concept()
    {
        return $this->belongsTo(Concept::class, 'concept_id')->withTrashed();
    }
    
    public function element()
    {
        return $this->belongsTo(Element::class, 'element_id')->withTrashed();
    }
    
}
