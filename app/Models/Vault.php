<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vault extends Model
{
    use HasFactory;

    protected $fillable = ["nome", "saldo"];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function enter()
    {
        return $this->hasMany(Enter::class);
    }

    public function exits()
    {
        return $this->hasMany(Exits::class);
    }

}
