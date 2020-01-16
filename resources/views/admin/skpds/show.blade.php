@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.skpd.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.skpds.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.skpd.fields.id') }}
                        </th>
                        <td>
                            {{ $skpd->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.skpd.fields.nm_skpd') }}
                        </th>
                        <td>
                            {{ $skpd->nm_skpd }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.skpd.fields.initial') }}
                        </th>
                        <td>
                            {{ $skpd->initial }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.skpd.fields.is_sub_unit') }}
                        </th>
                        <td>
                            {{ App\Skpd::IS_SUB_UNIT_SELECT[$skpd->is_sub_unit] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.skpd.fields.sub_unit') }}
                        </th>
                        <td>
                            {{ $skpd->sub_unit }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.skpd.fields.is_aktif') }}
                        </th>
                        <td>
                            {{ App\Skpd::IS_AKTIF_SELECT[$skpd->is_aktif] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.skpds.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#skpd_users" role="tab" data-toggle="tab">
                {{ trans('cruds.user.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="skpd_users">
            @includeIf('admin.skpds.relationships.skpdUsers', ['users' => $skpd->skpdUsers])
        </div>
    </div>
</div>

@endsection