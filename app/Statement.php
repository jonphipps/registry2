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
 * @property string $elementset
 * @property string $vocabulary
 * @property string $project
 * @property string $property
 * @property string $concept
 * @property string $element
*/
class Statement extends Model
{
    use SoftDeletes;

    protected $fillable = ['value', 'translation_id', 'elementset_id', 'vocabulary_id', 'project_id', 'property_id', 'concept_id', 'element_id'];
    
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
    public function setProjectIdAttribute($input)
    {
        $this->attributes['project_id'] = $input ? $input : null;
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setPropertyIdAttribute($input)
    {
        $this->attributes['property_id'] = $input ? $input : null;
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
    
    public function translation()
    {
        return $this->belongsTo(Translation::class, 'translation_id')->withTrashed();
    }
    
    public function elementset()
    {
        return $this->belongsTo(Elementset::class, 'elementset_id')->withTrashed();
    }
    
    public function vocabulary()
    {
        return $this->belongsTo(Vocabulary::class, 'vocabulary_id')->withTrashed();
    }
    
    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id')->withTrashed();
    }
    
    public function property()
    {
        return $this->belongsTo(Property::class, 'property_id')->withTrashed();
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
