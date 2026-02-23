<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Inquiry extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_email',
        'event_type',
        'event_type_other',
        'event_date',
        'postal_code',
    ];

    protected function casts(): array
    {
        return [
            'event_date' => 'date',
        ];
    }

    public function djs(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'inquiry_dj', 'inquiry_id', 'dj_id')
            ->withTimestamps();
    }
}
