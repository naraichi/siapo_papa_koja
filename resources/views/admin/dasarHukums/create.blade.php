@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.dasarHukum.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.dasar-hukums.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="uraian">{{ trans('cruds.dasarHukum.fields.uraian') }}</label>
                <input class="form-control {{ $errors->has('uraian') ? 'is-invalid' : '' }}" type="text" name="uraian" id="uraian" value="{{ old('uraian', '') }}" required>
                @if($errors->has('uraian'))
                    <span class="text-danger">{{ $errors->first('uraian') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.dasarHukum.fields.uraian_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="nomor">{{ trans('cruds.dasarHukum.fields.nomor') }}</label>
                <input class="form-control {{ $errors->has('nomor') ? 'is-invalid' : '' }}" type="text" name="nomor" id="nomor" value="{{ old('nomor', '') }}" required>
                @if($errors->has('nomor'))
                    <span class="text-danger">{{ $errors->first('nomor') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.dasarHukum.fields.nomor_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="tahun">{{ trans('cruds.dasarHukum.fields.tahun') }}</label>
                <input class="form-control date {{ $errors->has('tahun') ? 'is-invalid' : '' }}" type="text" name="tahun" id="tahun" value="{{ old('tahun') }}" required>
                @if($errors->has('tahun'))
                    <span class="text-danger">{{ $errors->first('tahun') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.dasarHukum.fields.tahun_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="file">{{ trans('cruds.dasarHukum.fields.file') }}</label>
                <div class="needsclick dropzone {{ $errors->has('file') ? 'is-invalid' : '' }}" id="file-dropzone">
                </div>
                @if($errors->has('file'))
                    <span class="text-danger">{{ $errors->first('file') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.dasarHukum.fields.file_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="created_by_id">{{ trans('cruds.dasarHukum.fields.created_by') }}</label>
                <select class="form-control select2 {{ $errors->has('created_by') ? 'is-invalid' : '' }}" name="created_by_id" id="created_by_id" required>
                    @foreach($created_bies as $id => $created_by)
                        <option value="{{ $id }}" {{ old('created_by_id') == $id ? 'selected' : '' }}>{{ $created_by }}</option>
                    @endforeach
                </select>
                @if($errors->has('created_by_id'))
                    <span class="text-danger">{{ $errors->first('created_by_id') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.dasarHukum.fields.created_by_helper') }}</span>
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

@section('scripts')
<script>
    Dropzone.options.fileDropzone = {
    url: '{{ route('admin.dasar-hukums.storeMedia') }}',
    maxFilesize: 5, // MB
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 5
    },
    success: function (file, response) {
      $('form').find('input[name="file"]').remove()
      $('form').append('<input type="hidden" name="file" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="file"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($dasarHukum) && $dasarHukum->file)
      var file = {!! json_encode($dasarHukum->file) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="file" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }

         return _results
     }
}
</script>
@endsection