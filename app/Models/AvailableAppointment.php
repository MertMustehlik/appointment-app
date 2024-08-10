<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class AvailableAppointment extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ["start_date", "end_date", "admin_id"];

    protected $casts = [
        "start_date" => "datetime",
        "end_date" => "datetime",
    ];

    public function admin(): BelongsTo
    {
        return $this->belongsTo(Admin::class);
    }
}
