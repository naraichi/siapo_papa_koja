<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroySkpdRequest;
use App\Http\Requests\StoreSkpdRequest;
use App\Http\Requests\UpdateSkpdRequest;
use App\Skpd;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class SkpdController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = Skpd::query()->select(sprintf('%s.*', (new Skpd)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'skpd_show';
                $editGate      = 'skpd_edit';
                $deleteGate    = 'skpd_delete';
                $crudRoutePart = 'skpds';

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
            $table->editColumn('nm_skpd', function ($row) {
                return $row->nm_skpd ? $row->nm_skpd : "";
            });
            $table->editColumn('initial', function ($row) {
                return $row->initial ? $row->initial : "";
            });
            $table->editColumn('is_sub_unit', function ($row) {
                return $row->is_sub_unit ? Skpd::IS_SUB_UNIT_SELECT[$row->is_sub_unit] : '';
            });
            $table->editColumn('sub_unit', function ($row) {
                return $row->sub_unit ? $row->sub_unit : "";
            });
            $table->editColumn('is_aktif', function ($row) {
                return $row->is_aktif ? Skpd::IS_AKTIF_SELECT[$row->is_aktif] : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.skpds.index');
    }

    public function create()
    {
        abort_if(Gate::denies('skpd_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.skpds.create');
    }

    public function store(StoreSkpdRequest $request)
    {
        $skpd = Skpd::create($request->all());

        return redirect()->route('admin.skpds.index');
    }

    public function edit(Skpd $skpd)
    {
        abort_if(Gate::denies('skpd_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.skpds.edit', compact('skpd'));
    }

    public function update(UpdateSkpdRequest $request, Skpd $skpd)
    {
        $skpd->update($request->all());

        return redirect()->route('admin.skpds.index');
    }

    public function show(Skpd $skpd)
    {
        abort_if(Gate::denies('skpd_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $skpd->load('skpdUsers');

        return view('admin.skpds.show', compact('skpd'));
    }

    public function destroy(Skpd $skpd)
    {
        abort_if(Gate::denies('skpd_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $skpd->delete();

        return back();
    }

    public function massDestroy(MassDestroySkpdRequest $request)
    {
        Skpd::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
