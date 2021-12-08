<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['nama', 'harga', 'deskripsi', 'foto']; // nama-nama column yang ada di dalam tabel yang bersifat publik
}
