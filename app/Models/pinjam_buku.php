<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class pinjam_buku extends Model
{
    use HasFactory;
    protected $fillable=[
        'admin_id',
        'anggota_id',
        'book_id',
        'name',
        'tanggal_pinjam',
        'tanggal_kembali',
        'status'
    ];
    public function user():BelongsTo{
        return $this->belongsTo(User::class);
    }
    public function anggota():BelongsTo{
        return $this->belongsTo(anggota::class);
    }
    public function book():BelongsTo{
        return $this->belongsTo(book::class);
    }
}
