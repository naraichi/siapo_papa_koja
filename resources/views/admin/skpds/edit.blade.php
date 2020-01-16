@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.skpd.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.skpds.update", [$skpd->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="nm_skpd">{{ trans('cruds.skpd.fields.nm_skpd') }}</label>
                <input class="form-control {{ $errors->has('nm_skpd') ? 'is-invalid' : '' }}" type="text" name="nm_skpd" id="nm_skpd" value="{{ old('nm_skpd', $skpd->nm_skpd) }}" required>
                @if($errors->has('nm_skpd'))
                    <span class="text-danger">{{ $errors->first('nm_skpd') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.skpd.fields.nm_skpd_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="initial">{{ trans('cruds.skpd.fields.initial') }}</label>
                <input class="form-control {{ $errors->has('initial') ? 'is-invalid' : '' }}" type="text" name="initial" id="initial" value="{{ old('initial', $skpd->initial) }}">
                @if($errors->has('initial'))
                    <span class="text-danger">{{ $errors->first('initial') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.skpd.fields.initial_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.skpd.fields.is_sub_unit') }}</label>
                <select class="form-control {{ $errors->has('is_sub_unit') ? 'is-invalid' : '' }}" name="is_sub_unit" id="is_sub_unit" required>
                    <option value disabled {{ old('is_sub_unit', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Skpd::IS_SUB_UNIT_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('is_sub_unit', $skpd->is_sub_unit) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('is_sub_unit'))
                    <span class="text-danger">{{ $errors->first('is_sub_unit') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.skpd.fields.is_sub_unit_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="sub_unit">{{ trans('cruds.skpd.fields.sub_unit') }}</label>
                <input class="form-control {{ $errors->has('sub_unit') ? 'is-invalid' : '' }}" type="number" name="sub_unit" id="sub_unit" value="{{ old('sub_unit', $skpd->sub_unit) }}" step="1" required>
                @if($errors->has('sub_unit'))
                    <span class="text-danger">{{ $errors->first('sub_unit') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.skpd.fields.sub_unit_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.skpd.fields.is_aktif') }}</label>
                <select class="form-control {{ $errors->has('is_aktif') ? 'is-invalid' : '' }}" name="is_aktif" id="is_aktif" required>
                    <option value disabled {{ old('is_aktif', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Skpd::IS_AKTIF_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('is_aktif', $skpd->is_aktif) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('is_aktif'))
                    <span class="text-danger">{{ $errors->first('is_aktif') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.skpd.fields.is_aktif_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection