<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *      type="object",
 * ),
 */
class Currency extends Model
{
    use HasFactory;
    
    public $timestamps = false;

    public $fillable = [
        'valute_id',
        'num_code',
        'char_code',
        'name',
        'value',
        'date',
    ];

    public function getDateFormat()
    {
        return 'c';
    }

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
     *    property="valute_id",
     *    type="string",
     * ),
     */
    public $valute_id;

    /**
     * @var(type="string")
     * 
     * @OA\Property(
     *    property="num_code",
     *    type="string",
     * ),
     */
    public $num_code;

    /**
     * @var(type="string")
     * 
     * @OA\Property(
     *    property="char_code",
     *    type="string",
     * ),
     */
    public $char_code;

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
     *    property="value",
     *    type="string",
     * ),
     */
    public $value;

    /**
     * @var(type="string")
     * 
     * @OA\Property(
     *    property="date",
     *    type="string",
     * ),
     */
    public $date;  
}
