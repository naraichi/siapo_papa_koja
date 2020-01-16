@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.kontak.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.kontaks.update", [$kontak->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="uraian">{{ trans('cruds.kontak.fields.uraian') }}</label>
                <input class="form-control {{ $errors->has('uraian') ? 'is-invalid' : '' }}" type="text" name="uraian" id="uraian" value="{{ old('uraian', $kontak->uraian) }}" required>
                @if($errors->has('uraian'))
                    <span class="text-danger">{{ $errors->first('uraian') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.kontak.fields.uraian_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="detail">{{ trans('cruds.kontak.fields.detail') }}</label>
                <input class="form-control {{ $errors->has('detail') ? 'is-invalid' : '' }}" type="text" name="detail" id="detail" value="{{ old('detail', $kontak->detail) }}" required>
                @if($errors->has('detail'))
                    <span class="text-danger">{{ $errors->first('detail') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.kontak.fields.detail_helper') }}</span>
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