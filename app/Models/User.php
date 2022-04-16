<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

/**
 * @OA\Schema(
 *      type="object",
 * ),
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * @var(type="number")
     * 
     * @OA\Property(
     *    property="id",
     *    type="number",
     * ),
     */
    public $id;

    /**
     * @var(type="string")
     * 
     * @OA\Property(
     *    property="name",
     *    type="string",
     * ),
     */
    public $name;

    /**
     * @var(type="string")
     * 
     * @OA\Property(
     *    property="email",
     *    type="string",
     * ),
     */
    public $email;

    /**
     * @var(type="string")
     * 
     * @OA\Property(
     *    property="created_at",
     *    type="string",
     * ),
     */
    public $created_at;

    /**
     * @var(type="string")
     * 
     * @OA\Property(
     *    property="updated_at",
     *    type="string",
     * ),
     */
    public $updated_at;
}
