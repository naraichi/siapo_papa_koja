<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyKontakRequest;
use App\Http\Requests\StoreKontakRequest;
use App\Http\Requests\UpdateKontakRequest;
use App\Kontak;
use App\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class KontakController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = Kontak::with(['created_by'])->select(sprintf('%s.*', (new Kontak)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'kontak_show';
                $editGate      = 'kontak_edit';
                $deleteGate    = 'kontak_delete';
                $crudRoutePart = 'kontaks';

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
            $table->editColumn('detail', function ($row) {
                return $row->detail ? $row->detail : "";
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.kontaks.index');
    }

    public function create()
    {
        abort_if(Gate::denies('kontak_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $created_bies = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.kontaks.create', compact('created_bies'));
    }

    public function store(StoreKontakRequest $request)
    {
        $kontak = Kontak::create($request->all());

        return redirect()->route('admin.kontaks.index');
    }

    public function edit(Kontak $kontak)
    {
        abort_if(Gate::denies('kontak_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $kontak->load('created_by');

        return view('admin.kontaks.edit', compact('kontak'));
    }

    public function update(UpdateKontakRequest $request, Kontak $kontak)
    {
        $kontak->update($request->all());

        return redirect()->route('admin.kontaks.index');
    }

    public function show(Kontak $kontak)
    {
        abort_if(Gate::denies('kontak_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $kontak->load('created_by');

        return view('admin.kontaks.show', compact('kontak'));
    }

    public function destroy(Kontak $kontak)
    {
        abort_if(Gate::denies('kontak_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $kontak->delete();

        return back();
    }

    public function massDestroy(MassDestroyKontakRequest $request)
    {
        Kontak::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
