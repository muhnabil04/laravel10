<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $fillable = ['nama', 'kategori_id', 'harga', 'berat', 'unit_id'];

    use HasFactory;

    protected $guarded = ['id'];

    public function scopeCari($query, array $cari)
    {
        $query->when($cari['kategori'] ?? false, function ($query, $kategori) {
            $query->orwhereHas('kategori', function ($query) use ($kategori) {
                $query->where('nama', 'like', '%' . $kategori . '%');
            });
        });

        $query->when($cari['pencarian'] ?? false, function ($query, $pencarian) {
            $query->where('nama', 'like', '%' . $pencarian . '%')
                ->orWhere('berat', 'like', '%' . $pencarian . '%')
                ->orWhereHas('kategori', function ($query) use ($pencarian) {
                    $query->where('nama', 'like', '%' . $pencarian . '%');
                });
        });

        return $query;
    }


    public function scopeShow($query, $kategori)
    {
        $query->where('kategori_id', $kategori)->orderBy('id', 'desc');
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    public function getRouteKeyName()
    {
        return 'nama';
    }


    // // nama tabel
    // protected $table = 'produks';
    // // id tabel
    // protected $primaryKey = 'id';
    // // autoincrement id
    // public $incrementing = true;
    // // tipe data id
    // protected $keyType = 'integer';
    // // timestamp
    // public $timestamps = true;
}
