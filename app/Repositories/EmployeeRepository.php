<?php

namespace App\Repositories;

use App\Models\Employee;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class EmployeeRepository
 * @package App\Repositories
 * @version October 19, 2019, 1:15 pm UTC
 *
 * @method Employee findWithoutFail($id, $columns = ['*'])
 * @method Employee find($id, $columns = ['*'])
 * @method Employee first($columns = ['*'])
*/
class EmployeeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'first_name',
        'last_name',
        'company_id',
        'email',
        'phone'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Employee::class;
    }

    /**
     * @return mixed
     */
    public function getEmployees()
    {
        return  Employee::query()
            ->leftjoin('companies', 'companies.id', '=', 'employees.company_id')
            ->select([
                'employees.*',
                'companies.name as company_name',
            ])
            ->paginate(config('adminlte.admin_per_page', '10'));
    }
}
