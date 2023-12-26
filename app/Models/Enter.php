<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enter extends Model
{
    use HasFactory;

    protected $fillable = ["valor"];

    public function vault()
    {
        return $this->belongsTo(Vault::class);
    }
}
