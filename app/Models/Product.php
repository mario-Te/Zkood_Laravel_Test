<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    protected $appends = [
        'total_quantity',
        'image_path',
    ];

    public function units()
    {
        //
        return $this->belongsToMany(Unit::class)->withPivot('amount'); ;
    }

    public function getTotalQuantityAttribute()
    {
       $value=0;
        foreach ($this->units()->get() as $uni) {
            $value+= $uni->modifier* $uni->pivot->amount;
        }
        return $value;
    }

    public function getImagePathAttribute()
    {
        return $this->morphOne(Image::class, 'o');    
    }
}
