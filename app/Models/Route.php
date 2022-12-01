<?php

namespace App\Models;

use App\Models\Crag;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Route extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'crag_id',
        'grade',
    ];

    public function crag(): BelongsTo
    {
        return $this->belongsTo(Crag::class);
    }
}