<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IndikatorProposalController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('indikator_proposal_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.indikatorProposals.index');
    }
}
