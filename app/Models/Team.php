<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // protected $fillable = [
    //     'name', 'email',
    // ];

    public function sport()
    {
        return $this->belongsTo(Sport::class);
    }
    public function images()
    {
        return $this->hasMany(Image::class);
    }

}
