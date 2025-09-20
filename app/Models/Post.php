<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;


class Post extends Model
{
    //
    use \Illuminate\Database\Eloquent\Concerns\HasTimestamps;

    use SoftDeletes;
    use HasFactory;

    protected $fillable = [
        
        'title',
        'content',
        'user_id',
        'updated_at',
        'photo'
    ];
    function user(): BelongsTo
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
