<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EmailQueue extends Model
{
    use HasFactory;

    protected $fillable = [
        'post_id',
        'sent',
    ];

    /**
     * Get the post associated with the email queue.
     */
    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }
}
