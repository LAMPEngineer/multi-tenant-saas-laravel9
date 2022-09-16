<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Individual extends Model
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
        'tenant_id',
    ];

    public static function boot()
    {
        parent::boot();

        static::addGlobalScope('individual_created_tenant', function(Builder $builder){
            if(auth()->check()){
                return $builder->where('tenant_id', auth()->id());
            }
        });
    }


    public function user()
    {
        return $this->belongsTo(User::class, 'tenant_id');
    }

}
