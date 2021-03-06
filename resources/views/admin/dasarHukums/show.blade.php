@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.dasarHukum.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.dasar-hukums.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.dasarHukum.fields.id') }}
                        </th>
                        <td>
                            {{ $dasarHukum->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dasarHukum.fields.uraian') }}
                        </th>
                        <td>
                            {{ $dasarHukum->uraian }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dasarHukum.fields.nomor') }}
                        </th>
                        <td>
                            {{ $dasarHukum->nomor }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dasarHukum.fields.tahun') }}
                        </th>
                        <td>
                            {{ $dasarHukum->tahun }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.dasarHukum.fields.file') }}
                        </th>
                        <td>
                            @if($dasarHukum->file)
                                <a href="{{ $dasarHukum->file->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.dasar-hukums.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection