@extends('layouts.admin')
@section('content')
@can('unduhan_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.unduhans.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.unduhan.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.unduhan.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Unduhan">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.unduhan.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.unduhan.fields.uraian') }}
                        </th>
                        <th>
                            {{ trans('cruds.unduhan.fields.file') }}
                        </th>
                        <th>
                            {{ trans('cruds.unduhan.fields.created_by') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($unduhans as $key => $unduhan)
                        <tr data-entry-id="{{ $unduhan->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $unduhan->id ?? '' }}
                            </td>
                            <td>
                                {{ $unduhan->uraian ?? '' }}
                            </td>
                            <td>
                                @if($unduhan->file)
                                    <a href="{{ $unduhan->file->getUrl() }}" target="_blank">
                                        {{ trans('global.view_file') }}
                                    </a>
                                @endif
                            </td>
                            <td>
                                {{ $unduhan->created_by->name ?? '' }}
                            </td>
                            <td>
                                @can('unduhan_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.unduhans.show', $unduhan->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('unduhan_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.unduhans.edit', $unduhan->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('unduhan_delete')
                                    <form action="{{ route('admin.unduhans.destroy', $unduhan->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('unduhan_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.unduhans.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    order: [[ 1, 'desc' ]],
    pageLength: 25,
  });
  $('.datatable-Unduhan:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection