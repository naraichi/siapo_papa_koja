@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.unduhan.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.unduhans.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.unduhan.fields.id') }}
                        </th>
                        <td>
                            {{ $unduhan->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.unduhan.fields.uraian') }}
                        </th>
                        <td>
                            {{ $unduhan->uraian }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.unduhan.fields.file') }}
                        </th>
                        <td>
                            @if($unduhan->file)
                                <a href="{{ $unduhan->file->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.unduhan.fields.created_by') }}
                        </th>
                        <td>
                            {{ $unduhan->created_by->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.unduhans.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection