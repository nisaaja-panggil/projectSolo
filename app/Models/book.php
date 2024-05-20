<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class book extends Model
{
    use HasFactory;
    protected $fillable=[
        'judul',
        'pengarang',
        'penerbit',
        'sinopsis',
        'status',
        'cover'
    ];
    public function pinjam_buku():HasMany{
        return $this->hasMany(pinjam_buku::class);
    }
}
