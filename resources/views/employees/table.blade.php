<div class="table-responsive">
    <table class="table table-striped" id="employees-table">
        <thead>
            <tr>
                <th>
                    <div class="table-header">
                        <span class="column-title">{{ __('employees.first_name') }}</span>
                    </div>
                </th>
                <th>
                    <div class="table-header">
                        <span class="column-title">{{ __('employees.last_name') }}</span>
                    </div>
                </th>
                <th>
                    <div class="table-header">
                        <span class="column-title">{{ __('employees.company') }}</span>
                    </div>
                    <div class="filter-block">
                        <input type="text" value="" class="form-control filter-field" placeholder="{{ __('general.search') }}" />
                    </div>
                </th>
                <th>
                    <div class="table-header">
                        <span class="column-title">{{ __('employees.email') }}</span>
                    </div>
                    <div class="filter-block">
                        <input type="text" value="" class="form-control filter-field" placeholder="{{ __('general.search') }}" />
                    </div>
                </th>
                <th>
                    <div class="table-header">
                        <span class="column-title">{{ __('employees.phone') }}</span>
                    </div>
                    <div class="filter-block">
                        <input type="text" value="" class="form-control filter-field" placeholder="{{ __('general.search') }}" />
                    </div>
                </th>
                <th>{{ __('general.actions') }}</th>
            </tr>
        </thead>
        <tbody>
        @foreach($employees as $employee)
            <tr>
                <td>{!! $employee->first_name !!}</td>
                <td>{!! $employee->last_name !!}</td>
                <td>{!! $employee->company_name !!}</td>
                <td>{!! $employee->email !!}</td>
                <td>{!! $employee->phone !!}</td>
                <td>
                    {!! Form::open(['route' => ['employees.destroy', $employee->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('employees.show', [$employee->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('employees.edit', [$employee->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@section('scripts')
    <script src="/js/admin/datatables.js"></script>
@stop
