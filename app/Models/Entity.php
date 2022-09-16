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
        'individual_id',     
    ];



    /**
     * Get the individual that the entity belongs to.
     */
     public function individual()
     {
         return $this->belongsTo(Individual::class, 'individual_id');
     }

}
