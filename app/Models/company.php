<?php

namespace App\Models;
use App\Models\employee;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class company extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'email', 'logo', 'website'
    ];

    public function employees()
    {
        return $this->hasMany(employee::class);
    }
}
