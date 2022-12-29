<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Rennokki\QueryCache\Traits\QueryCacheable;

/**
 * Class User
 *
 * @property int $id
 * @property string $name
 *
 * @property Collection|Attachment[] $attachments
 * @property Collection|Cadeau[] $cadeaus
 * @property Collection|Fopper[] $foppers
 *
 * @package App\Models
 */
class User extends Model
{

    use QueryCacheable;
    protected $cacheFor = 1800; // 3 minutes

	protected $table = 'users';
	public $timestamps = false;

	protected $fillable = [
		'name'
	];

	public function images()
	{
		return $this->hasMany(Attachment::class, 'uploadedBy');
	}

	public function reservations()
	{
		return $this->hasMany(Cadeau::class, 'reservedBy');
	}

    public function myList()
    {
        return $this->hasMany(Cadeau::class, 'listId');
    }

    public function createdCadeaus()
    {
        return $this->hasMany(Cadeau::class, 'createdBy');
    }

	public function foppers()
	{
		return $this->hasMany(Fopper::class, 'fopperVan');
	}
}
