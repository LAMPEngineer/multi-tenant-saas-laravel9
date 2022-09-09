<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Basic extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'tax_id_number',
        'phone',
        'country',
        'user_id',
    ];

    public static function boot()
    {
        parent::boot();

        static::addGlobalScope('basic_created_user', function(Builder $builder){
            if(auth()->check()){
                return $builder->where('user_id', auth()->id());
            }
        });
    }


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
