<?php

namespace App\Repositories;

use App\Models\Company;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class CompanyRepository
 * @package App\Repositories
 * @version October 19, 2019, 11:59 am UTC
 *
 * @method Company findWithoutFail($id, $columns = ['*'])
 * @method Company find($id, $columns = ['*'])
 * @method Company first($columns = ['*'])
*/
class CompanyRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'email',
        'logo',
        'phone',
        'fax',
        'address',
        'website'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Company::class;
    }

    /**
     * Prepare data for company select
     *
     * @return mixed
     */
    public function getCompaniesForSelect()
    {
        return  Company::whereNull('deleted_at')->pluck('name', 'id');
    }

}
