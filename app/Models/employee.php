<?php

namespace App\Models;
use App\Models\company;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class employee extends Model
{
    use HasFactory;
    protected $fillable = [
        'first_name', 'last_name', 'email', 'phone', 'company_id'
    ];

    public function company()
    {
        return $this->belongsTo(company::class);
    }
}
