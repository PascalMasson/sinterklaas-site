<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Rennokki\QueryCache\Traits\QueryCacheable;
use Storage;

/**
 * Class Attachment
 *
 * @property int $id
 * @property string $url
 * @property int $uploadedBy
 * @property int $cadeauId
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property Cadeau $cadeau
 * @property User $user
 *
 * @package App\Models
 */
class Attachment extends Model
{

	protected $table = 'attachments';

	protected $casts = [
		'uploadedBy' => 'int',
		'cadeauId' => 'int'
	];

	protected $fillable = [
		'url',
		'uploadedBy',
		'cadeauId'
	];

	public function cadeau()
	{
		return $this->belongsTo(Cadeau::class, 'cadeauId');
	}

	public function uploadedBy()
	{
		return $this->belongsTo(User::class, 'uploadedBy');
	}

    public static function boot()
    {
        parent::boot(); // TODO: Change the autogenerated stub

        static::deleting(function($image) { // before delete() method call this
            info('deleting image');
            info($image);
            $result = Storage::disk('public')->delete($image->url);
            info($result);
            // do the rest of the cleanup...
        });
    }
}
