<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entity extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'number_of_employees',
        'industry',   
        'basic_id',     
        'user_id',        
    ];


/*   public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }*/


    /**
     * Get the basic that the entity belongs to.
     */
    /*public function basic()
    {
        return $this->belongsTo(Basic::class);
    }*/

}
