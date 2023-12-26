<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $fillable = [
        "nome",
        "telefone",
        "cargo",
        "nivel",
        "status",
        "senha"
    ];

    public function posts(){
        return $this->hasMany(Post::class);
    }

    public function believers()
    {
        return $this->hasMany(Believer::class);
    }

    public function vault()
    {
        return $this->hasMany(Vault::class);
    }

}
