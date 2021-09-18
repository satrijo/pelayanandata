<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'satuan', 'waktu', 'deskripsi','status'];
    public $timestamps = false;

    public function prices()
    {
       return $this->hasMany(Price::class);
    }
}
