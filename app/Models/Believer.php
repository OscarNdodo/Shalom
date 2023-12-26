<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Believer extends Model
{
    use HasFactory;

    protected $fillable = [
        "nome",
        "genero",
        "data_nascimento",
        "endereco",
        "batizado",
        "contacto",
        "cargo"
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
