<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class QuoteRequest extends Model
{
    protected $fillable = ['name', 'company_name', 'email', 'phone', 'service_id', 'description', 'status'];

    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }
}