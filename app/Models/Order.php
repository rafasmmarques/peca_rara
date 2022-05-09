<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
// use \Staudenmeir\EloquentJsonRelations\HasJsonRelationships;

class Order extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'client_id', 'products',
    ];

    protected $dates = [
        'deleted_at',
    ];

    protected $casts = [
        'products' => 'array',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function products(){
        return $this->belongsToMany(Product::class, 'order_products');
    }
}
