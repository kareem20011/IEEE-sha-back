<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'status',
    ];
    

    public function workshops()
    {
        return $this->hasMany(Workshop::class);
    }

    public function boards()
    {
        return $this->hasMany(Board::class);
    }
}
