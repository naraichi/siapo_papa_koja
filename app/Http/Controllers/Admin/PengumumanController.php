<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyPengumumanRequest;
use App\Http\Requests\StorePengumumanRequest;
use App\Http\Requests\UpdatePengumumanRequest;
use App\Pengumuman;
use App\User;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class PengumumanController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = Pengumuman::with(['user'])->select(sprintf('%s.*', (new Pengumuman)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'pengumuman_show';
                $editGate      = 'pengumuman_edit';
                $deleteGate    = 'pengumuman_delete';
                $crudRoutePart = 'pengumumen';

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
            $table->editColumn('file', function ($row) {
                return $row->file ? '<a href="' . $row->file->getUrl() . '" target="_blank">' . trans('global.downloadFile') . '</a>' : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'file']);

            return $table->make(true);
        }

        return view('admin.pengumumen.index');
    }

    public function create()
    {
        abort_if(Gate::denies('pengumuman_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.pengumumen.create', compact('users'));
    }

    public function store(StorePengumumanRequest $request)
    {
        $pengumuman = Pengumuman::create($request->all());

        if ($request->input('file', false)) {
            $pengumuman->addMedia(storage_path('tmp/uploads/' . $request->input('file')))->toMediaCollection('file');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $pengumuman->id]);
        }

        return redirect()->route('admin.pengumumen.index');
    }

    public function edit(Pengumuman $pengumuman)
    {
        abort_if(Gate::denies('pengumuman_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pengumuman->load('user');

        return view('admin.pengumumen.edit', compact('pengumuman'));
    }

    public function update(UpdatePengumumanRequest $request, Pengumuman $pengumuman)
    {
        $pengumuman->update($request->all());

        if ($request->input('file', false)) {
            if (!$pengumuman->file || $request->input('file') !== $pengumuman->file->file_name) {
                $pengumuman->addMedia(storage_path('tmp/uploads/' . $request->input('file')))->toMediaCollection('file');
            }
        } elseif ($pengumuman->file) {
            $pengumuman->file->delete();
        }

        return redirect()->route('admin.pengumumen.index');
    }

    public function show(Pengumuman $pengumuman)
    {
        abort_if(Gate::denies('pengumuman_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pengumuman->load('user');

        return view('admin.pengumumen.show', compact('pengumuman'));
    }

    public function destroy(Pengumuman $pengumuman)
    {
        abort_if(Gate::denies('pengumuman_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pengumuman->delete();

        return back();
    }

    public function massDestroy(MassDestroyPengumumanRequest $request)
    {
        Pengumuman::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('pengumuman_create') && Gate::denies('pengumuman_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Pengumuman();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media', 'public');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
