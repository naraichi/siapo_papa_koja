<?php

namespace App\Http\Controllers\Admin;

use App\DasarHukum;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyDasarHukumRequest;
use App\Http\Requests\StoreDasarHukumRequest;
use App\Http\Requests\UpdateDasarHukumRequest;
use App\User;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class DasarHukumController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = DasarHukum::with(['created_by'])->select(sprintf('%s.*', (new DasarHukum)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'dasar_hukum_show';
                $editGate      = 'dasar_hukum_edit';
                $deleteGate    = 'dasar_hukum_delete';
                $crudRoutePart = 'dasar-hukums';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : "";
            });
            $table->editColumn('uraian', function ($row) {
                return $row->uraian ? $row->uraian : "";
            });
            $table->editColumn('nomor', function ($row) {
                return $row->nomor ? $row->nomor : "";
            });

            $table->editColumn('file', function ($row) {
                return $row->file ? '<a href="' . $row->file->getUrl() . '" target="_blank">' . trans('global.downloadFile') . '</a>' : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'file']);

            return $table->make(true);
        }

        return view('admin.dasarHukums.index');
    }

    public function create()
    {
        abort_if(Gate::denies('dasar_hukum_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $created_bies = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.dasarHukums.create', compact('created_bies'));
    }

    public function store(StoreDasarHukumRequest $request)
    {
        $dasarHukum = DasarHukum::create($request->all());

        if ($request->input('file', false)) {
            $dasarHukum->addMedia(storage_path('tmp/uploads/' . $request->input('file')))->toMediaCollection('file');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $dasarHukum->id]);
        }

        return redirect()->route('admin.dasar-hukums.index');
    }

    public function edit(DasarHukum $dasarHukum)
    {
        abort_if(Gate::denies('dasar_hukum_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dasarHukum->load('created_by');

        return view('admin.dasarHukums.edit', compact('dasarHukum'));
    }

    public function update(UpdateDasarHukumRequest $request, DasarHukum $dasarHukum)
    {
        $dasarHukum->update($request->all());

        if ($request->input('file', false)) {
            if (!$dasarHukum->file || $request->input('file') !== $dasarHukum->file->file_name) {
                $dasarHukum->addMedia(storage_path('tmp/uploads/' . $request->input('file')))->toMediaCollection('file');
            }
        } elseif ($dasarHukum->file) {
            $dasarHukum->file->delete();
        }

        return redirect()->route('admin.dasar-hukums.index');
    }

    public function show(DasarHukum $dasarHukum)
    {
        abort_if(Gate::denies('dasar_hukum_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dasarHukum->load('created_by');

        return view('admin.dasarHukums.show', compact('dasarHukum'));
    }

    public function destroy(DasarHukum $dasarHukum)
    {
        abort_if(Gate::denies('dasar_hukum_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dasarHukum->delete();

        return back();
    }

    public function massDestroy(MassDestroyDasarHukumRequest $request)
    {
        DasarHukum::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('dasar_hukum_create') && Gate::denies('dasar_hukum_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new DasarHukum();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media', 'public');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
