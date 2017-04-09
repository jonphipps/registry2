<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Export
 *
 * @package App
 * @property string $user
 * @property string $vocabulary
 * @property string $elementset
 * @property tinyInteger $excude_deprecated
 * @property tinyInteger $include_generated
 * @property tinyInteger $include_deleted
 * @property text $selected_columns
 * @property string $selected_language
 * @property string $published_english_version
 * @property string $published_language_version
 * @property string $last_vocab_update
 * @property string $profile
 * @property string $file
 * @property text $map
*/
class Export extends Model
{
    use SoftDeletes;

    protected $fillable = ['excude_deprecated', 'include_generated', 'include_deleted', 'selected_columns', 'selected_language', 'published_english_version', 'published_language_version', 'last_vocab_update', 'file', 'map', 'user_id', 'vocabulary_id', 'elementset_id', 'profile_id'];
    
    public static function boot()
    {
        parent::boot();

        Export::observe(new \App\Observers\UserActionsObserver);
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
     * Set attribute to date format
     * @param $input
     */
    public function setLastVocabUpdateAttribute($input)
    {
        if ($input != null && $input != '') {
            $this->attributes['last_vocab_update'] = Carbon::createFromFormat(config('app.date_format') . ' H:i:s', $input)->format('Y-m-d H:i:s');
        } else {
            $this->attributes['last_vocab_update'] = null;
        }
    }

    /**
     * Get attribute from date format
     * @param $input
     *
     * @return string
     */
    public function getLastVocabUpdateAttribute($input)
    {
        $zeroDate = str_replace(['Y', 'm', 'd'], ['0000', '00', '00'], config('app.date_format') . ' H:i:s');

        if ($input != $zeroDate && $input != null) {
            return Carbon::createFromFormat('Y-m-d H:i:s', $input)->format(config('app.date_format') . ' H:i:s');
        } else {
            return '';
        }
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setProfileIdAttribute($input)
    {
        $this->attributes['profile_id'] = $input ? $input : null;
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
    
    public function profile()
    {
        return $this->belongsTo(Profile::class, 'profile_id')->withTrashed();
    }
    
}
