<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Grade extends Model
{
    protected $guarded = [
        "id",
    ];

    public function postes(): HasMany
    {
        return $this->hasMany(Poste::class);
    }

    public function personnels(): HasMany
    {
        return $this->hasMany(Personnel::class);
    }
}
