<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pengaduan extends Model
{
    protected $fillable =[
       'user_id',
       'category_id',
       'lokasi',
       'deskripsi',
       'status',
       'feedback',
    ];

    public function user(): belongsTo{
        return $this->BelongsTo(User::class);
    }
    public function category(): BelongsTo{
        return $this->BelongsTo(Category::class);
    }
}
