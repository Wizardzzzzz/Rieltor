<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    public function advertisement()
    {
        return $this->belongsTo("App\Models\Advertisement");
    }
    use HasFactory;
}
