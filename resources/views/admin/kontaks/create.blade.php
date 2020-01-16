@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.kontak.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.kontaks.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="uraian">{{ trans('cruds.kontak.fields.uraian') }}</label>
                <input class="form-control {{ $errors->has('uraian') ? 'is-invalid' : '' }}" type="text" name="uraian" id="uraian" value="{{ old('uraian', '') }}" required>
                @if($errors->has('uraian'))
                    <span class="text-danger">{{ $errors->first('uraian') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.kontak.fields.uraian_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="detail">{{ trans('cruds.kontak.fields.detail') }}</label>
                <input class="form-control {{ $errors->has('detail') ? 'is-invalid' : '' }}" type="text" name="detail" id="detail" value="{{ old('detail', '') }}" required>
                @if($errors->has('detail'))
                    <span class="text-danger">{{ $errors->first('detail') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.kontak.fields.detail_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="created_by_id">{{ trans('cruds.kontak.fields.created_by') }}</label>
                <select class="form-control select2 {{ $errors->has('created_by') ? 'is-invalid' : '' }}" name="created_by_id" id="created_by_id" required>
                    @foreach($created_bies as $id => $created_by)
                        <option value="{{ $id }}" {{ old('created_by_id') == $id ? 'selected' : '' }}>{{ $created_by }}</option>
                    @endforeach
                </select>
                @if($errors->has('created_by_id'))
                    <span class="text-danger">{{ $errors->first('created_by_id') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.kontak.fields.created_by_helper') }}</span>
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