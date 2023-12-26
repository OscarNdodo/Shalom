<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exits extends Model
{
    use HasFactory;

    protected $fillable = [
        "valor",
        "motivo"
    ];

    public function vault()
    {
        return $this->belongsTo(Vault::class);
    }
}
