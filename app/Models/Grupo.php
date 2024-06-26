<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class Grupo extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'user_id',
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function alumno(){
        return $this->hasOne(Alumno::class);
    }
}
