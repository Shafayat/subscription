<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Subscriber extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'website_id',
    ];

    /**
     * Get the website that the subscriber belongs to.
     */
    public function website(): BelongsTo
    {
        return $this->belongsTo(Website::class);
    }
}
