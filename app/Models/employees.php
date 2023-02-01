<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class employees extends Model
{
    use HasFactory;
    protected $fillable = ['name, companyId, email'];
    protected $table = 'employees';

    public function companies()
    {
        return $this->belongsTo(companies::class, 'companyId');
    }

    public function users()
    {
        return $this->hasMany(users::class, 'employeId');
    }
}
