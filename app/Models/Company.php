<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Company
 * @package App\Models
 * @version October 19, 2019, 11:59 am UTC
 *
 * @property string name
 * @property string email
 * @property string logo
 * @property string phone
 * @property string fax
 * @property string address
 * @property string website
 */
class Company extends Model
{
    use SoftDeletes;

    public $table = 'companies';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'email',
        'logo',
        'phone',
        'fax',
        'address',
        'website'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'email' => 'string',
        'logo' => 'string',
        'phone' => 'string',
        'fax' => 'string',
        'address' => 'string',
        'website' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required'
    ];
}
