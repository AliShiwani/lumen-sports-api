<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Entity extends Model
{

    // protected $table = 'entities';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // protected $fillable = [
    //     'name', 'email',
    // ];

    public function entitySports()
    {
        return $this->hasMany(EntitySport::class, 'entity_id');
    }

}
