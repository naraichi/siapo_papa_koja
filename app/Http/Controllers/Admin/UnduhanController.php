<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyUnduhanRequest;
use App\Http\Requests\StoreUnduhanRequest;
use App\Http\Requests\UpdateUnduhanRequest;
use App\Unduhan;
use App\User;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class UnduhanController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('unduhan_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $unduhans = Unduhan::all();

        return view('admin.unduhans.index', compact('unduhans'));
    }

    public function create()
    {
        abort_if(Gate::denies('unduhan_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $created_bies = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.unduhans.create', compact('created_bies'));
    }

    public function store(StoreUnduhanRequest $request)
    {
        $unduhan = Unduhan::create($request->all());

        if ($request->input('file', false)) {
            $unduhan->addMedia(storage_path('tmp/uploads/' . $request->input('file')))->toMediaCollection('file');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $unduhan->id]);
        }

        return redirect()->route('admin.unduhans.index');
    }

    public function edit(Unduhan $unduhan)
    {
        abort_if(Gate::denies('unduhan_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $created_bies = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $unduhan->load('created_by');

        return view('admin.unduhans.edit', compact('created_bies', 'unduhan'));
    }

    public function update(UpdateUnduhanRequest $request, Unduhan $unduhan)
    {
        $unduhan->update($request->all());

        if ($request->input('file', false)) {
            if (!$unduhan->file || $request->input('file') !== $unduhan->file->file_name) {
                $unduhan->addMedia(storage_path('tmp/uploads/' . $request->input('file')))->toMediaCollection('file');
            }
        } elseif ($unduhan->file) {
            $unduhan->file->delete();
        }

        return redirect()->route('admin.unduhans.index');
    }

    public function show(Unduhan $unduhan)
    {
        abort_if(Gate::denies('unduhan_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $unduhan->load('created_by');

        return view('admin.unduhans.show', compact('unduhan'));
    }

    public function destroy(Unduhan $unduhan)
    {
        abort_if(Gate::denies('unduhan_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $unduhan->delete();

        return back();
    }

    public function massDestroy(MassDestroyUnduhanRequest $request)
    {
        Unduhan::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('unduhan_create') && Gate::denies('unduhan_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Unduhan();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media', 'public');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
