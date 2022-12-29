<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Rennokki\QueryCache\Traits\QueryCacheable;

/**
 * Class Fopper
 *
 * @property int $id
 * @property string $inhoud
 * @property int $fopperVan
 * @property int $fopperVoor
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property User $user
 *
 * @package App\Models
 */
class Fopper extends Model
{
	protected $table = 'foppers';

	protected $casts = [
		'fopperVan' => 'int',
		'fopperVoor' => 'int'
	];

	protected $fillable = [
		'description',
		'fopperVan',
		'fopperVoor'
	];

	public function voor()
	{
		return $this->belongsTo(User::class, 'fopperVoor');
	}

    public function eigenaar()
    {
        return $this->belongsTo(User::class, 'fopperVan');
    }
}
