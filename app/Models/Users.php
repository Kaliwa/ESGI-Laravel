<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int    $updated_at
 * @property int    $created_at
 * @property int    $email_verified_at
 * @property string $remember_token
 * @property string $password
 * @property string $email
 * @property string $name
 */
class Users extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

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
        'updated_at', 'created_at', 'remember_token', 'password', 'email_verified_at', 'email', 'name'
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
        'updated_at' => 'timestamp', 'created_at' => 'timestamp', 'remember_token' => 'string', 'password' => 'string', 'email_verified_at' => 'timestamp', 'email' => 'string', 'name' => 'string'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'updated_at', 'created_at', 'email_verified_at'
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
