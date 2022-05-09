<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
// use \Staudenmeir\EloquentJsonRelations\HasJsonRelationships;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name', 'price', 'photo_url',
    ];

    protected $dates = [
        'deleted_at',
    ];

    // public function orders()
    // {
    //     return $this->belongsToJson(Order::class, 'products->id');
    // }

    public function getPhotoUrlAttribute($value)
    {
        return asset('storage/img/' . $value);
    }

    public function getPriceFormattedAttribute()
    {
        return 'R$ ' . number_format($this->price, 2, ',', '.');
    }


}
