<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserConfirmationCode extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'code', 'method', 'expires_at', 'confirmed'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
