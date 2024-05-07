<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_product',
        'harga',
        'stock',
        'deskripsi',
        'category_id'
    ];

    public function Category(){
        $this->belongsTo(CategoryProducts::class,'category_id');
    }
}
