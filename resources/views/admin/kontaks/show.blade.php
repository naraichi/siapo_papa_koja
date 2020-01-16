@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.kontak.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.kontaks.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.kontak.fields.id') }}
                        </th>
                        <td>
                            {{ $kontak->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.kontak.fields.uraian') }}
                        </th>
                        <td>
                            {{ $kontak->uraian }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.kontak.fields.detail') }}
                        </th>
                        <td>
                            {{ $kontak->detail }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.kontaks.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection