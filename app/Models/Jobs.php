<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int    $attempts
 * @property int    $created_at
 * @property int    $available_at
 * @property int    $reserved_at
 * @property string $payload
 * @property string $queue
 */
class Jobs extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'jobs';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'attempts', 'created_at', 'available_at', 'reserved_at', 'payload', 'queue'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'attempts' => 'int', 'created_at' => 'int', 'available_at' => 'int', 'reserved_at' => 'int', 'payload' => 'string', 'queue' => 'string'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var boolean
     */
    public $timestamps = false;

    // Scopes...

    // Functions ...

    // Relations ...
}
