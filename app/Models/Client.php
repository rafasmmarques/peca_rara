<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name', 'email', 'phone', 'address', 'address_complement', 'neighborhood', 'zip', 'birth_date',
    ];

    protected $dates = [
        'deleted_at',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function getMaskedPhoneAttribute()
    {
        return preg_replace('/^(\d{2})(\d{4}|\d{5})(\d{4})$/', '($1) $2-$3', $this->phone);
    }

}
