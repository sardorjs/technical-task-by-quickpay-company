<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property int $user_id
 * @property string $code
 * @property string $method
 * @property Carbon $expires_at
 * @property bool $confirmed
 * @method static Builder|UserConfirmationCode query()
 */
class UserConfirmationCode extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'code', 'method', 'expires_at', 'confirmed'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
