<div>

    <table class="table table-bordered table-striped table-hover category-table" data-toggle="dataTable" data-form="deleteForm">
        <thead>
        <tr>
            <th>Name</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($categoryList as $category)
            <tr>
                <td>{{ $category->category_name }}</td>
                <td>
                    <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-info btn-xs">{{ trans('categories.edit') }}</a>

                    {!! Form::model($category, ['method' => 'delete', 'route' => ['categories.destroy', $category->id], 'class' =>'form-inline form-delete']) !!}
                    {!! Form::hidden('id', $category->id) !!}
                    {!! Form::submit(trans('categories.delete'), ['class' => 'btn btn-xs btn-danger delete', 'name' => 'delete_modal']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>