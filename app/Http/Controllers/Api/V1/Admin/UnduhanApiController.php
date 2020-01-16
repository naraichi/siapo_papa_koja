<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreUnduhanRequest;
use App\Http\Requests\UpdateUnduhanRequest;
use App\Http\Resources\Admin\UnduhanResource;
use App\Unduhan;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UnduhanApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('unduhan_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new UnduhanResource(Unduhan::with(['created_by'])->get());
    }

    public function store(StoreUnduhanRequest $request)
    {
        $unduhan = Unduhan::create($request->all());

        if ($request->input('file', false)) {
            $unduhan->addMedia(storage_path('tmp/uploads/' . $request->input('file')))->toMediaCollection('file');
        }

        return (new UnduhanResource($unduhan))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Unduhan $unduhan)
    {
        abort_if(Gate::denies('unduhan_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new UnduhanResource($unduhan->load(['created_by']));
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

        return (new UnduhanResource($unduhan))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Unduhan $unduhan)
    {
        abort_if(Gate::denies('unduhan_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $unduhan->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
