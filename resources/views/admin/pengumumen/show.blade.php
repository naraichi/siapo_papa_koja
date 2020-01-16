@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.pengumuman.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.pengumumen.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.pengumuman.fields.id') }}
                        </th>
                        <td>
                            {{ $pengumuman->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pengumuman.fields.uraian') }}
                        </th>
                        <td>
                            {{ $pengumuman->uraian }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pengumuman.fields.file') }}
                        </th>
                        <td>
                            @if($pengumuman->file)
                                <a href="{{ $pengumuman->file->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pengumuman.fields.is_arsip') }}
                        </th>
                        <td>
                            {{ $pengumuman->is_arsip }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.pengumumen.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection