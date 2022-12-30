<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use App\Casts\ReadableNumberCast;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Cadeau
 *
 * @property int $id
 * @property string $title
 * @property string|null $description
 * @property string $status
 * @property float $prijs
 * @property string $location
 * @property int $createdBy
 * @property int $listId
 * @property int|null $reservedBy
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property User|null $user
 * @property Collection|Attachment[] $attachments
 *
 * @package App\Models
 */
class Cadeau extends Model
{

    protected $table = 'cadeaus';

    protected $casts = [
        'prijs' => ReadableNumberCast::class,
        'createdBy' => 'int',
        'listId' => 'int',
        'reservedBy' => 'int'
    ];

    protected $fillable = [
        'title',
        'description',
        'status',
        'prijs',
        'location',
        'createdBy',
        'listId',
        'reservedBy'
    ];

    public static function boot()
    {
        parent::boot();

        static::deleting(function ($cadeau) { // before delete() method call this
            $images = $cadeau->images()->get();
            foreach ($images as $image) {
                $image->delete();
            }
            // do the rest of the cleanup...
        });

    }

    public function images()
    {
        return $this->hasMany(Attachment::class, 'cadeauId');
    }

    public function reserver()
    {
        return $this->belongsTo(User::class, 'reservedBy');
    }

    public function listOwner()
    {
        return $this->belongsTo(User::class, 'listId');
    }
}
